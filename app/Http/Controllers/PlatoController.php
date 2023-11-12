<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    // Muestra una lista de todos los platos.
    public function index()
    {
        $platos = Plato::all();
        return view('platos.index', compact('platos'));
    }

    // Muestra el formulario para crear un nuevo plato.
    public function create()
    {
        return view('platos.create');
    }

    // Almacena un nuevo plato en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'imagen' => 'nullable|image|max:1024', // Asumiendo que se subirá una imagen.
            'descripcion' => 'nullable|max:100',
            'estado' => 'required|boolean',
        ]);

        // Si hay una imagen, procesarla y obtener la ruta para guardarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        Plato::create($validatedData);
        return redirect('/platos')->with('success', 'Plato creado con éxito.');
    }

    // Muestra un plato específico.
    public function show(Plato $plato)
    {
        return view('platos.show', compact('plato'));
    }

    // Muestra el formulario para editar un plato existente.
    public function edit(Plato $plato)
    {
        return view('platos.edit', compact('plato'));
    }

    // Actualiza un plato en la base de datos.
    public function update(Request $request, Plato $plato)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'imagen' => 'nullable|image|max:1024',
            'descripcion' => 'nullable|max:100',
            'estado' => 'required|boolean',
        ]);

        // Si hay una nueva imagen, procesarla y obtener la ruta para guardarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        $plato->update($validatedData);
        return redirect('/platos')->with('success', 'Plato actualizado con éxito.');
    }

    // Elimina un plato de la base de datos.
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return redirect('/platos')->with('success', 'Plato eliminado con éxito.');
    }
}
