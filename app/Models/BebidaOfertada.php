<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BebidaOfertada extends Model
{
    use HasFactory;

    protected $fillable = ['gestion_menu_id', 'bebida_id', 'cantidad'];

    public function gestionMenu()
    {
        return $this->belongsTo(GestionMenu::class);
    }

    public function bebida()
    {
        return $this->belongsTo(Bebida::class);
    }
}
