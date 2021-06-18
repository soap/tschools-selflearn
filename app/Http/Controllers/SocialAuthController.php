<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{

    protected $redirect_to = 'home';

    /**
     * 
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login');
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        
        Auth::login($authUser, true);

        return redirect($this->redirect_to);
    }


    public function findOrCreateUser($providerUser, $provider)
    {
        $account = SocialAccount::whereProviderName($provider)
                  ->whereProviderUserId($providerUser->getId())
                  ->first();

        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (! $user) {
                $user = User::create([
                   'email' => $providerUser->getEmail(),
                   'first_name'  => $providerUser->getName(),
                ]);
            }

            $user->identities()->create([
                'provider_user_id'  => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}
