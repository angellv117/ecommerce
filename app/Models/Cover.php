<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
class Cover extends Model
{
    //

    protected $fillable = [
        'image_path',
        'title',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::url($value),
        );
    }
}
