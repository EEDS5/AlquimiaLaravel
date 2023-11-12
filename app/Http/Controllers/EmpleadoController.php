<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Persona;
use App\Models\TipoEmpleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Muestra una lista de todos los empleados.
    public function index()
    {
        $empleados = Empleado::with(['persona', 'tipoEmpleado'])->get();
        return view('empleados.index', compact('empleados'));
    }

    // Muestra el formulario para crear un nuevo empleado.
    public function create()
    {
        $personas = Persona::all();
        $tipoEmpleados = TipoEmpleado::all();
        return view('empleados.create', compact('personas', 'tipoEmpleados'));
    }

    // Almacena un nuevo empleado en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipo_empleado_id' => 'required|exists:tipo_empleados,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
            'estado' => 'required|boolean',
        ]);

        Empleado::create($validatedData);
        return redirect('/empleados')->with('success', 'Empleado creado con éxito.');
    }

    // Muestra un empleado específico.
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    // Muestra el formulario para editar un empleado existente.
    public function edit(Empleado $empleado)
    {
        $personas = Persona::all();
        $tipoEmpleados = TipoEmpleado::all();
        return view('empleados.edit', compact('empleado', 'personas', 'tipoEmpleados'));
    }

    // Actualiza un empleado en la base de datos.
    public function update(Request $request, Empleado $empleado)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'tipo_empleado_id' => 'required|exists:tipo_empleados,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
            'estado' => 'required|boolean',
        ]);

        $empleado->update($validatedData);
        return redirect('/empleados')->with('success', 'Empleado actualizado con éxito.');
    }

    // Elimina un empleado de la base de datos.
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect('/empleados')->with('success', 'Empleado eliminado con éxito.');
    }
}
