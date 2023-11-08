<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMenu extends Model
{
    protected $fillable = [
        'descripcion', 'costo', 'total_cupo', 'cupo_disponible', 'fecha', 'estado'
    ];

    // Si cada gestión de menú pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
