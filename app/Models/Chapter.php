<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Chapter extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'name', 'slug', 'description', 'episode_id'
    ];
    public function topic()
    {
        return $this->belongsTo(\App\Models\Topic::class);
    }

    public function episodes()
    {
        return $this->hasMany(\App\Models\Episode::class);
    }
}
