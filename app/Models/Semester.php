<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semester'; // Nombre correcto de la tabla

    protected $fillable = [
        'dateStart',
        'dateEnd',
        'frozen',
    ];

    public function servingTurns()
    {
        return $this->hasMany(ServingTurn::class);
    }
    
    use HasFactory;
}