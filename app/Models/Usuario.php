<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing=false;

    protected $fillable = ['username', 'contraseña', 'estado'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
