<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{
    protected $fillable = [
        'employeeId',
        'expiration',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
