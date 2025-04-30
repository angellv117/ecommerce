<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //asignacion masiva
    protected $fillable = ['sku', 'image_path', 'product_id'];
    
    // relacion muchos a uno con producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //relacion muchos a muchos con features
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }
    
    
}
