<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatingTable extends Model
{

    use HasFactory;

    public function occupiedSeatingTables()
    {
        return $this->hasMany(OccupiedSeatingTable::class);
    }

}
