<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    protected $fillable = ['rol', 'estado'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
