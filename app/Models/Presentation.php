<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    //asignacion masiva
    protected $fillable = ['name'];
    
    // relacion uno a muchos con productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
