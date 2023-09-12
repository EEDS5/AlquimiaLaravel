<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateImage extends Model
{
    protected $fillable = [
        'isPrimary',
        'plateId',
        'imageBlob',
        'mimetype',
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }
}
