<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'estado'];

    public function gestionMenu()
    {
        return $this->hasMany(GestionMenu::class);
    }
}
