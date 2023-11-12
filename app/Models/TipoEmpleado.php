<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    public function empleado()
    {
        return $this->hasMany(Empleado::class);
    }
}
