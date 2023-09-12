<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'servingTurnId',
        'menuDescription',
        'isOpen',
    ];

    public function servingTurn()
    {
        return $this->belongsTo(ServingTurn::class);
    }

    public function plateServings()
    {
        return $this->hasMany(PlateServing::class);
    }
}
