<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\TipoPersona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // Muestra una lista de todas las personas.
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    // Muestra el formulario para crear una nueva persona.
    public function create()
    {
        $tipoPersonas = TipoPersona::all();
        return view('personas.create', compact('tipoPersonas'));
    }

    // Almacena una nueva persona en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_persona_id' => 'required|exists:tipo_personas,id',
            'ci' => 'required|max:30|unique:personas',
            'nombre' => 'required|max:60',
            'apellido_p' => 'required|max:30',
            'apellido_m' => 'required|max:30',
            'telefono' => 'nullable|max:30|unique:personas',
            'direccion' => 'nullable|max:50',
            'email' => 'required|max:30|unique:personas',
            'estado' => 'required|boolean',
        ]);

        Persona::create($validatedData);
        return redirect('/personas')->with('success', 'Persona creada con éxito.');
    }

    // Muestra una persona específica.
    public function show(Persona $persona)
    {
        return view('personas.show', compact('persona'));
    }

    // Muestra el formulario para editar una persona existente.
    public function edit(Persona $persona)
    {
        $tipoPersonas = TipoPersona::all();
        return view('personas.edit', compact('persona', 'tipoPersonas'));
    }

    // Actualiza una persona en la base de datos.
    public function update(Request $request, Persona $persona)
    {
        $validatedData = $request->validate([
            'tipo_persona_id' => 'required|exists:tipo_personas,id',
            'ci' => 'required|max:30|unique:personas,ci,' . $persona->id,
            'nombre' => 'required|max:60',
            'apellido_p' => 'required|max:30',
            'apellido_m' => 'required|max:30',
            'telefono' => 'nullable|max:30|unique:personas,telefono,' . $persona->id,
            'direccion' => 'nullable|max:50',
            'email' => 'required|max:30|unique:personas,email,' . $persona->id,
            'estado' => 'required|boolean',
        ]);

        $persona->update($validatedData);
        return redirect('/personas')->with('success', 'Persona actualizada con éxito.');
    }

    // Elimina una persona de la base de datos.
    public function destroy(Persona $persona)
    {
        $persona->delete();
        return redirect('/personas')->with('success', 'Persona eliminada con éxito.');
    }
}
