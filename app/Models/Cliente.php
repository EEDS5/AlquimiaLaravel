<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'persona_id', 'fecha_registro', 'razon_social', 'estado'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
