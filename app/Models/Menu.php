<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'estado'];

    public function plato()
    {
        return $this->belongsToMany(Plato::class, 'menu_ofertado');
    }
}
