<?php

namespace App\Http\Controllers;

use App\Models\TipoEmpleado;
use App\Models\Empleado;
use Illuminate\Http\Request;

class TipoEmpleadoController extends Controller
{
    public function index()
    {
        $tipos = TipoEmpleado::all();
        return view('tipo_empleados.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo_empleados.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rol' => 'required|max:50',
            'estado' => 'required|boolean'
        ]);

        TipoEmpleado::create($validatedData);
        return redirect('/tipo_empleados')->with('success', 'Tipo de empleado creado correctamente.');
    }

    public function show(TipoEmpleado $tipoEmpleado)
    {
        return view('tipo_empleados.show', compact('tipoEmpleado'));
    }

    public function edit(TipoEmpleado $tipoEmpleado)
    {
        return view('tipo_empleados.edit', compact('tipoEmpleado'));
    }

    public function update(Request $request, TipoEmpleado $tipoEmpleado)
    {
        $validatedData = $request->validate([
            'rol' => 'required|max:50',
            'estado' => 'required|boolean'
        ]);

        $tipoEmpleado->update($validatedData);
        return redirect('/tipo_empleados')->with('success', 'Tipo de empleado actualizado correctamente.');
    }

    public function destroy(TipoEmpleado $tipoEmpleado)
    {
        $tipoEmpleado->delete();
        return redirect('/tipo_empleados')->with('success', 'Tipo de empleado eliminado correctamente.');
    }
}
