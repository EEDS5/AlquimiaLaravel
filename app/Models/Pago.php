<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'monto_total', 'estado'];

    public function comprobante()
    {
        return $this->hasMany(ComprobanteDePago::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class);
    }

    public function consumoBebida()
    {
        return $this->hasMany(ConsumoBebida::class);
    }
}
