<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'estado'];

    // Si una bebida puede estar en múltiples gestiones de menú
    public function gestionesMenus()
    {
        return $this->belongsToMany(GestionMenu::class, 'bebida_ofertadas');
    }
}
