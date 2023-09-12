<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNote extends Model
{
    protected $fillable = [
        'reservationId',
        'note',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
