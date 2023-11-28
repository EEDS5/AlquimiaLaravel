<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMenuDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'gestion_menu_id',
        'menu_ofertado_id'
    ];

    public function gestionMenu()
    {
        return $this->belongsTo(GestionMenu::class);
    }

    public function menuOfertado()
    {
        return $this->belongsTo(MenuOfertado::class);
    }
}