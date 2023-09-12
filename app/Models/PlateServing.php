<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateServing extends Model
{
    protected $fillable = [
        'plateId',
        'menuId',
        'slots',
        'price',
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function reservationItems()
    {
        return $this->hasMany(ReservationItem::class, 'servingId');
    }
}