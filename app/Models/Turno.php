<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = ['descripcion', 'hora_entrada', 'hora_limite', 'estado'];

    // Si un turno está asociado a muchos empleados
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_turnos');
    }
}
