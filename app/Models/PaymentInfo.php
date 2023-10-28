<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;
    
    protected $table = 'payment_info'; //Nombre correcto de la tabla
    protected $fillable = [
        'reservationId',
        'paymentMethod',
        'billingName',
        'billingNit',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
