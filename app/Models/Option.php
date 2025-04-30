<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //asignacion masiva
    protected $fillable = ['value', 'type'];
    
    // relacion muchos a muchos con producto
    public function products()
    {
        return $this->belongsToMany(Product::class) ->withPivot('value')->withTimestamps();
    }
    //relacion uno a muchos con features
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
    
    
}
