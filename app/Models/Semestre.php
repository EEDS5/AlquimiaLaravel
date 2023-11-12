<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_final', 'estado'];

    public function gestionMenus()
    {
        return $this->hasMany(GestionMenu::class);
    }
}
