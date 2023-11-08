<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteDePago extends Model
{
    protected $fillable = ['fecha', 'pago_total', 'tipo_pago', 'pago_id'];

    // Si un comprobante está asociado a un pago
    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
