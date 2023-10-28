<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePrivilege;

class EmployeePrivilegeController extends Controller
{
    public function index()
    {
        $privileges = EmployeePrivilege::all();
        return view('privilege.index', ['privileges' => $privileges]);
    }

    public function create()
    {
        return view('privilege.create');
    }

    public function store(Request $request)
    {
        $privilege = EmployeePrivilege::create($request->all());
        return redirect()->route('privilege.index');
    }

    public function show(string $id)
    {
        $privilege = EmployeePrivilege::find($id);
        return view('privilege.show', ['privilege' => $privilege]);
    }

    public function edit(string $id)
    {
        $privilege = EmployeePrivilege::find($id);
        return view('privilege.edit', ['privilege' => $privilege]);
    }

    public function update(Request $request, string $id)
    {
        $privilege = EmployeePrivilege::find($id);
        $privilege->update($request->all());
        return redirect()->route('privilege.index');
    }

    public function destroy(string $id)
    {
        $privilege = EmployeePrivilege::find($id);
        $privilege->delete();
        return redirect()->route('privilege.index');
    }

}
