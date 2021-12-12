<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Episode extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function chapter()
    {
        return $this->belongsTo(\App\Models\Chapter::class);
    }
}
