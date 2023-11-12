<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'gestion_menu_id', 'pago_id', 'fecha', 'monto', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function gestionMenu()
    {
        return $this->belongsTo(GestionMenu::class);
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
