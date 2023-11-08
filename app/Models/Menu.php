<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nombre', 'estado'];

    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'menu_ofertados');
    }
}
