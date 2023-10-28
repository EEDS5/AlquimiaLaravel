<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminToken extends Model
{

    use HasFactory;

    protected $table = 'admin_token'; //Nombre correcto de la tabla
    protected $fillable = [
        'employeeId',
        'expiration',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
