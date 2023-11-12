<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'imagen', 'estado'];

    public function gestionMenu()
    {
        return $this->belongsToMany(GestionMenu::class, 'bebida_ofertada');
    }
}
