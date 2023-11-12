<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumoBebida extends Model
{
    use HasFactory;

    protected $fillable = ['bebida_ofertada_id', 'pago_id', 'cantidad', 'precio'];

    public function bebidaOfertada()
    {
        return $this->belongsTo(BebidaOfertada::class);
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
