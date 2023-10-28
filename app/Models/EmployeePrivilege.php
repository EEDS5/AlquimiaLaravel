<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePrivilege extends Model
{

    use HasFactory;
    
    protected $table = 'employee_privilege'; //Nombre correcto de la tabla
    protected $fillable = [
        'employeeId',
        'privilegeLevel',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
