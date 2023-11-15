<?php

namespace App\Http\Controllers;

use App\Models\TipoEmpleado;
use Illuminate\Http\Request;

class TipoEmpleadoController extends Controller
{
    public function index()
    {
        $tipoEmpleados = TipoEmpleado::all();
        return view('tipoEmpleados.index', compact('tipoEmpleados'));
    }

    public function create()
    {
        return view('tipoEmpleados.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
        ]);

        TipoEmpleado::create($validatedData);
        return redirect('/tipoEmpleados')->with('success', 'Tipo de empleado creado con éxito.');
    }

    public function show(TipoEmpleado $tipoEmpleado)
    {
        return view('tipoEmpleados.show', compact('tipoEmpleado'));
    }

    public function edit(TipoEmpleado $tipoEmpleado)
    {
        return view('tipoEmpleados.edit', compact('tipoEmpleado'));
    }

    public function update(Request $request, TipoEmpleado $tipoEmpleado)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
        ]);

        $tipoEmpleado->update($validatedData);
        return redirect('/tipoEmpleados')->with('success', 'Tipo de empleado actualizado con éxito.');
    }

    public function destroy(TipoEmpleado $tipoEmpleado)
    {
        $tipoEmpleado->delete();
        return redirect('/tipoEmpleados')->with('success', 'Tipo de empleado eliminado con éxito.');
    }
}
