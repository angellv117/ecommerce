<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable = ['name', 'color'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
