<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    // Muestra una lista de todos los semestres.
    public function index()
    {
        $semestres = Semestre::all();
        return view('semestres.index', compact('semestres'));
    }

    // Muestra el formulario para crear un nuevo semestre.
    public function create()
    {
        return view('semestres.create');
    }

    // Almacena un nuevo semestre en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicio',
            'estado' => 'required|boolean',
        ]);

        Semestre::create($validatedData);
        return redirect('/semestres')->with('success', 'Semestre creado con éxito.');
    }

    // Muestra un semestre específico.
    public function show(Semestre $semestre)
    {
        return view('semestres.show', compact('semestre'));
    }

    // Muestra el formulario para editar un semestre existente.
    public function edit(Semestre $semestre)
    {
        return view('semestres.edit', compact('semestre'));
    }

    // Actualiza un semestre en la base de datos.
    public function update(Request $request, Semestre $semestre)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicio',
            'estado' => 'required|boolean',
        ]);

        $semestre->update($validatedData);
        return redirect('/semestres')->with('success', 'Semestre actualizado con éxito.');
    }

    // Elimina un semestre de la base de datos.
    public function destroy(Semestre $semestre)
    {
        $semestre->delete();
        return redirect('/semestres')->with('success', 'Semestre eliminado con éxito.');
    }
}
