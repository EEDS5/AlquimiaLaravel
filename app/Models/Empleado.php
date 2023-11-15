<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_empleado_id', 'fecha_inicio', 'fecha_fin', 'estado'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
