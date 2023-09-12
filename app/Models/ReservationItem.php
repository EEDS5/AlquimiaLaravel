<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationItem extends Model
{
    protected $fillable = [
        'reservationId',
        'servingId',
        'servingCount',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function plateServing()
    {
        return $this->belongsTo(PlateServing::class, 'servingId');
    }
}
