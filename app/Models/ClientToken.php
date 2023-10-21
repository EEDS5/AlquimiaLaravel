<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientToken extends Model
{
    protected $table = 'client_token'; //Nombre correcto de la tabla
    protected $fillable = [
        'expiration',
        'clientId',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
