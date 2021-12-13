<?php

namespace App\Policies;

use App\Models\User;
use Yadahan\AuthenticationLog\AuthenticationLog;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthenticationLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \Yadahan\AuthenticationLog\AuthenticationLog $authLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AuthenticationLog $authLog)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \Yadahan\AuthenticationLog\AuthenticationLog $authLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AuthenticationLog $authLog)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \Yadahan\AuthenticationLog\AuthenticationLog $authLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AuthenticationLog $authLog)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \Yadahan\AuthenticationLog\AuthenticationLog $authLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AuthenticationLog $authLog)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \Yadahan\AuthenticationLog\AuthenticationLog $authLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AuthenticationLog $authLog)
    {
        return $user->isSuperAdmin();
    }
}
