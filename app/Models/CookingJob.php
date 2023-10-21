<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingJob extends Model
{
    protected $table = 'cooking_job'; //Nombre correcto de la tabla
    protected $fillable = [
        'occupiedSeatingTableId',
        'expectedCompletionTime',
    ];

    public function occupiedSeatingTable()
    {
        return $this->belongsTo(OccupiedSeatingTable::class);
    }
}
