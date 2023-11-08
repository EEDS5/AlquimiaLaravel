<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descripcion', 'estado'];

    // Si una categoría puede estar asociada a muchas gestiones de menú
    public function gestionesMenus()
    {
        return $this->hasMany(GestionMenu::class);
    }
}
