<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'community',
        'city',
        'state',
        'country',
        'postal_code',
        'receiver_name',
        'reference',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];


}
