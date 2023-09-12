<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServingTurn extends Model
{
    protected $fillable = [
        'startTime',
        'endTime',
        'semesterId',
        'descript',
        'maxSlots',
        'frozen',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
