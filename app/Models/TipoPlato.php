<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlato extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    // Si un tipo de plato está asociado a múltiples platos
    public function platos()
    {
        return $this->hasMany(Plato::class);
    }
}
