<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'plateName',
        'defaultPrice',
        'descriptionShort',
        'descriptionLong',
        'frozen',
    ];

    public function images()
    {
        return $this->hasMany(PlateImage::class);
    }

    public function servings()
    {
        return $this->hasMany(PlateServing::class);
    }
}
