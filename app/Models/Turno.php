<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'hora_entrada', 'hora_limite', 'estado'];

    public function gestionMenus()
    {
        return $this->hasMany(GestionMenu::class);
    }
}
