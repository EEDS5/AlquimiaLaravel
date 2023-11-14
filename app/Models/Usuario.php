<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    
    public $incrementing=false;

    protected $fillable = ['id','username', 'contraseña', 'estado'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
