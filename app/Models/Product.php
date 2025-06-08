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

    public function scopeVerifyFamily($query, $family_id){
        $query->when($family_id, function($query, $family_id){
            $query->whereHas('subcategory.category', function($query) use ($family_id){
            $query->where('family_id', $family_id);
        });
    });
    }

    public function scopeVerifyCategory($query, $category_id){
        $query->when($category_id, function($query, $category_id){
            $query->whereHas('subcategory', function($query) use($category_id){
                $query->where('category_id', $category_id);
            });
        });
    }
    
    public function scopeVerifySubcategory($query, $subcategory_id){
        $query->when($subcategory_id, function($query) use($subcategory_id){
            $query->where('subcategory_id', $subcategory_id);
        });
    }

    //Refactorizacion de la consulta para ordenar los productos
    public function scopeCustomOrder($query, $orderBy){
        $query->when($orderBy == 1, function($query){
            $query->orderBy('created_at', 'desc');
        })
        ->when($orderBy == 2, function($query){
            $query->orderBy('price', 'desc');
        })
        ->when($orderBy == 3, function($query){
            $query->orderBy('price', 'asc');
        });
    }
    
    

    
    
}
