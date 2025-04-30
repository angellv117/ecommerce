<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //asignacion masiva
    protected $fillable = ['name'];
    
    // relacion uno a muchos con categorias
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    
}
