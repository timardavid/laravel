<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
