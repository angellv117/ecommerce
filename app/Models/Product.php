<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    //asignacion masiva
    protected $fillable = ['name', 'sku', 'description', 'image_path', 'price', 'max_temperature', 
    'min_temperature', 'time_to_melt', 'temperature_to_melt', 'presentation_id', 'subcategory_id', 'is_active'];
    
    // relacion uno a muchos con subcategoria
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // relacion uno a muchos con presentacion
    public function presentation()
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
    
    //relacion uno a muchos con imagenes
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    
    
    

    
    
}
