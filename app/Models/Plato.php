<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['nombre', 'imagen', 'descripcion', 'estado'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_ofertados');
    }
}
