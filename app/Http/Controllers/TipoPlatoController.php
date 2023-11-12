<?php

namespace App\Http\Controllers;

use App\Models\TipoPlato;
use Illuminate\Http\Request;

class TipoPlatoController extends Controller
{
    // Muestra una lista de todos los tipos de plato.
    public function index()
    {
        $tipoPlatos = TipoPlato::all();
        return view('tipoPlatos.index', compact('tipoPlatos'));
    }

    // Muestra el formulario para crear un nuevo tipo de plato.
    public function create()
    {
        return view('tipoPlatos.create');
    }

    // Almacena un nuevo tipo de plato en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|max:100',
            'estado' => 'required|boolean',
        ]);

        TipoPlato::create($validatedData);
        return redirect('/tipoPlatos')->with('success', 'Tipo de plato creado con éxito.');
    }

    // Muestra un tipo de plato específico.
    public function show(TipoPlato $tipoPlato)
    {
        return view('tipoPlatos.show', compact('tipoPlato'));
    }

    // Muestra el formulario para editar un tipo de plato existente.
    public function edit(TipoPlato $tipoPlato)
    {
        return view('tipoPlatos.edit', compact('tipoPlato'));
    }

    // Actualiza un tipo de plato en la base de datos.
    public function update(Request $request, TipoPlato $tipoPlato)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'nullable|max:100',
            'estado' => 'required|boolean',
        ]);

        $tipoPlato->update($validatedData);
        return redirect('/tipoPlatos')->with('success', 'Tipo de plato actualizado con éxito.');
    }

    // Elimina un tipo de plato de la base de datos.
    public function destroy(TipoPlato $tipoPlato)
    {
        $tipoPlato->delete();
        return redirect('/tipoPlatos')->with('success', 'Tipo de plato eliminado con éxito.');
    }
}
