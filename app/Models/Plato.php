<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = ['id','nombre', 'imagen', 'descripcion', 'estado'];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'menu_ofertado');
    }
}
