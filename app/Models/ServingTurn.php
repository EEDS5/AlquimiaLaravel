<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServingTurn extends Model
{
    protected $table = 'serving_turn'; //Nombre correcto de la tabla
    protected $fillable = [
        'startTime',
        'endTime',
        'semester_id',
        'descript',
        'maxSlots',
        'frozen',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id'); // Asegura que la relación use 'semester_id'
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}

