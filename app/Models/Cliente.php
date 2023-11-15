<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $incrementing=false;

    protected $fillable = ['id','razon_social', 'nit'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function tarjeta()
    {
        return $this->hasMany(Tarjeta::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class);
    }
}
