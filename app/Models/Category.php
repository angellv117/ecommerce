<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //asignacion masiva
    protected $fillable = ['name', 'family_id'];
    
    // relacion muchos a uno con familia
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    // relacion uno a muchos con subcategoria
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    
    
    
    
}
