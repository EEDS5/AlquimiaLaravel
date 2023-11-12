<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'monto_total', 'estado'];

    public function comprobantes()
    {
        return $this->hasMany(ComprobanteDePago::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function consumoBebidas()
    {
        return $this->hasMany(ConsumoBebida::class);
    }
}
