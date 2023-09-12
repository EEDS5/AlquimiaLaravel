<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccupiedSeatingTable extends Model
{
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
