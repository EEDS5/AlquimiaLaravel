<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        return redirect()->route('employee.index');
    }

    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.show', ['employee' => $employee]);
    }

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }

}
