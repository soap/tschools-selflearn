<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;
use Spatie\Tags\HasTags;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Episode extends Model implements Sortable
{
    use HasFactory;
    use HasTags;
    use SortableTrait;

    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public $sortable = [
        'order_column_name' => 'ordering',
        'sort_when_creating' => true,
    ];

    /**
     * 
     * @return Builder 
     * @throws InvalidArgumentException 
     */
    public function buildSortQuery()
    {
        return static::query()->where('chapter_id', $this->chapter_id);
    }

    /**
     * 
     * @return BelongsTo 
     */
    public function chapter()
    {
        return $this->belongsTo(\App\Models\Chapter::class);
    }
}
