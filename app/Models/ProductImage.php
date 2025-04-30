<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //asignacion masiva
    protected $fillable = ['product_id', 'path'];

    //relacion con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
