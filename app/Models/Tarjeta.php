<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'nro_tarjeta', 'entidad_bancaria', 'fecha_vencimiento'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
