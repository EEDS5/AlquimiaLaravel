<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    
    protected $fillable = ['tipo_persona_id', 'ci', 'nombre', 'apellido_p', 'apellido_m', 'telefono', 'direccion', 'email', 'estado'];

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function tipoPersona()
    {
        return $this->belongsTo(TipoPersona::class);
    }
}
