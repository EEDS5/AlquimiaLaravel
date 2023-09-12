<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'clientId',
        'servingTurnId',
        'slots',
        'confirmed',
        'confirmationEnableTime',
        'confirmationEndTime',
        'note',
        'frozen',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function servingTurn()
    {
        return $this->belongsTo(ServingTurn::class);
    }
}
