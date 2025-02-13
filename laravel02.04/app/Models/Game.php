<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{

    protected $fillable = [
        "title",
        "developer_id",
        "release_date",
        "genre"
    ];


    protected function casts(): array
    {
        return [
            "genre" => 'array'
        ];
    }

    public function scopeRecent(Builder $query): void {
        $query->where('release_date', '>', '2015-01-01');
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
