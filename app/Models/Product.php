<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //asignacion masiva
    protected $fillable = ['name', 'sku', 'description', 'image_path', 'price', 'presentation_id', 'subcategory_id'];
    
    // relacion uno a muchos con subcategoria
    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // relacion uno a muchos con presentacion
    public function presentations()
    {
        return $this->belongsTo(Presentation::class);
    }

    //relacion uno a muchos con variantes
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    //relacion muchos a muchos con opciones
    public function options()
    {
        return $this->belongsToMany(Option::class) ->withPivot('value')->withTimestamps();
    }
    
    
    
    

    
    
}
