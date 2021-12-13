<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

/**
 * Topic has many chapters
 * Chapter has many episodes
 * Episod has video link
 * @package App\Models
 */
class Topic extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function chapters()
    {
        return $this->hasMany(\App\Models\Chapter::class);
    }
}
