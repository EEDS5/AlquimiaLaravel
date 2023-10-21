<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientNote extends Model
{
    protected $table = 'client_note'; //Nombre correcto de la tabla
    protected $fillable = [
        'reservationId',
        'note',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
