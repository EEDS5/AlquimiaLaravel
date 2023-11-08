<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['fecha', 'monto_total', 'estado'];

    // Si un pago está asociado a una reserva
    public function reserva()
    {
        return $this->hasOne(Reserva::class);
    }
}
