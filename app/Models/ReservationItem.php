<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationItem extends Model
{ 
    use HasFactory;

    protected $table = 'reservation_item'; //Nombre correcto de la tabla
    protected $fillable = [
        'reservationId',
        'servingId',
        'servingCount',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class,'reservationId');
    }

    public function plateServing()
    {
        return $this->belongsTo(PlateServing::class, 'servingId');
    }
}
