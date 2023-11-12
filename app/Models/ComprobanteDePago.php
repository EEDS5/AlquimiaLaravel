<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteDePago extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'pago_total', 'estado', 'pago_id'];

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
