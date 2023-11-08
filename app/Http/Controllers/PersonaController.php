<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'identificacion' => 'required|max:30|unique:personas',
            'fecha_nacimiento' => 'nullable|date',
            'telefono' => 'nullable|max:30',
            'direccion' => 'nullable|max:50',
            'email' => 'required|max:30|unique:personas|email',
            'estado' => 'required|boolean',
        ]);

        Persona::create($validatedData);
        return redirect('/personas')->with('success', 'Persona creada correctamente.');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'identificacion' => 'required|max:30|unique:personas,identificacion,' . $id,
            'fecha_nacimiento' => 'nullable|date',
            'telefono' => 'nullable|max:30',
            'direccion' => 'nullable|max:50',
            'email' => 'required|max:30|unique:personas,email,' . $id . '|email',
            'estado' => 'required|boolean',
        ]);

        Persona::whereId($id)->update($validatedData);
        return redirect('/personas')->with('success', 'Persona actualizada correctamente.');
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect('/personas')->with('success', 'Persona eliminada correctamente.');
    }
}
