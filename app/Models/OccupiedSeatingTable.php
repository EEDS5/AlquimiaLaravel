<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupiedSeatingTable extends Model
{
    protected $table = 'occupied_seating_table'; //Nombre correcto de la tabla
    protected $fillable = [
        'seatingTableId',
        'reservationId',
    ];

    public function seatingTable()
    {
        return $this->belongsTo(SeatingTable::class);
    }

    public function cookingJob()
    {
        return $this->hasOne(CookingJob::class, 'occupiedSeatingTableId');
    }
}
