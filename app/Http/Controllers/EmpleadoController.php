<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\TipoEmpleado;
use App\Models\Turno;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('persona', 'tipoEmpleado')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $personas = Persona::all();
        $tipos = TipoEmpleado::all();
        return view('empleados.create', compact('personas', 'tipos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipo_empleado_id' => 'required|exists:tipo_empleados,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado' => 'required|boolean'
        ]);

        Empleado::create($validatedData);
        return redirect('/empleados')->with('success', 'Empleado creado correctamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        $personas = Persona::all();
        $tipos = TipoEmpleado::all();
        return view('empleados.edit', compact('empleado', 'personas', 'tipos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipo_empleado_id' => 'required|exists:tipo_empleados,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'estado' => 'required|boolean'
        ]);

        $empleado->update($validatedData);
        return redirect('/empleados')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect('/empleados')->with('success', 'Empleado eliminado correctamente.');
    }
}
