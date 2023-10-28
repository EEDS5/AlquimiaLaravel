<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;
    
    protected $table = 'employee'; //Nombre correcto de la tabla
    protected $fillable = [
        'username',
        'passwordSalt',
        'passwordHash',
    ];

    public function privileges()
    {
        return $this->hasMany(EmployeePrivilege::class);
    }

    public function adminTokens()
    {
        return $this->hasMany(AdminToken::class);
    }
}