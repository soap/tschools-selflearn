<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'provider_name', 
        'provider_user_id'];

    /**
     * One social account must belongs to one user (reverse relation for user->socialAccounts)
     * @return BelongsTo 
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
