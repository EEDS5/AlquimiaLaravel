<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = ['fecha', 'monto', 'estado'];

    // Si una entrada puede estar asociada a muchas reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
