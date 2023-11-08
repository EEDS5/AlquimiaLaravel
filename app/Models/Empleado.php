<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'persona_id', 'tipo_empleado_id', 'fecha_inicio', 'fecha_fin', 'estado'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function tipoEmpleado()
    {
        return $this->belongsTo(TipoEmpleado::class);
    }

    public function turnos()
    {
        return $this->belongsToMany(Turno::class, 'empleado_turnos');
    }
}
