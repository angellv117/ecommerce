<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    
    protected $guarded = [
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'content' => 'array',
        'address' => 'array',
    ];

    //relation with user table 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusNameAttribute()
    {
        return OrderStatus::from($this->status)->name;
    }

    
}
