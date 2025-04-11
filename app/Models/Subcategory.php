<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //asignacion masiva
    protected $fillable = ['name', 'category_id'];
    
    // relacion muchos a uno con categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relacion uno a muchos con producto
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    
    
}
