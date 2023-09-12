<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookingJob extends Model
{
    protected $fillable = [
        'occupiedSeatingTableId',
        'expectedCompletionTime',
    ];

    public function occupiedSeatingTable()
    {
        return $this->belongsTo(OccupiedSeatingTable::class);
    }
}
