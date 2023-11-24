<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // Muestra una lista de todos los turnos.
    public function index()
    {
        // $turnos = Turno::all();
        // return view('turnos.index', compact('turnos'));
        // Asegúrate de que solo se retornen los turnos activos si es necesario
        $turnos = Turno::where('estado', true)->get();
        return response()->json($turnos);
    }

    // Muestra el formulario para crear un nuevo turno.
    public function create()
    {
        return view('turnos.create');
    }

    // Almacena un nuevo turno en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_limite' => 'required|date_format:H:i|after:hora_entrada',
            'estado' => 'required|boolean',
        ]);

        Turno::create($validatedData);
        return redirect('/turnos')->with('success', 'Turno creado con éxito.');
    }

    // Muestra un turno específico.
    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    // Muestra el formulario para editar un turno existente.
    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    // Actualiza un turno en la base de datos.
    public function update(Request $request, Turno $turno)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_limite' => 'required|date_format:H:i|after:hora_entrada',
            'estado' => 'required|boolean',
        ]);

        $turno->update($validatedData);
        return redirect('/turnos')->with('success', 'Turno actualizado con éxito.');
    }

    // Elimina un turno de la base de datos.
    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect('/turnos')->with('success', 'Turno eliminado con éxito.');
    }
}
