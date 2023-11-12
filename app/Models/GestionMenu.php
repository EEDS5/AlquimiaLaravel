<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionMenu extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_id', 'semestre_id', 'tipo_plato_id', 'turno_id', 'menu_ofertado_id', 'descripcion', 'imagen', 'costo', 'total_cupo', 'cupo_disponible', 'fecha', 'estado'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function tipoPlato()
    {
        return $this->belongsTo(TipoPlato::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function menuOfertado()
    {
        return $this->belongsTo(MenuOfertado::class);
    }

    public function bebida()
    {
        return $this->belongsToMany(Bebida::class, 'bebida_ofertada');
    }
}
