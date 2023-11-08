<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'cliente_id', 'entrada_id', 'pago_id', 'fecha', 'monto', 'cantidad_cupo', 'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
