<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'fullName',
        'passwordSalt',
        'passwordHash',
        'phone',
        'email',
    ];

    public function tokens()
    {
        return $this->hasMany(ClientToken::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
