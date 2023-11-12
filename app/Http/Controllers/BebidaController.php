<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;

class BebidaController extends Controller
{// Muestra una lista de todas las bebidas.
    public function index()
    {
        $bebidas = Bebida::all();
        return view('bebidas.index', compact('bebidas'));
    }

    // Muestra el formulario para crear una nueva bebida.
    public function create()
    {
        return view('bebidas.create');
    }

    // Almacena una nueva bebida en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'nullable|max:30',
            'imagen' => 'nullable|image|max:1024', // Asumiendo que se subirá una imagen.
            'estado' => 'required|boolean',
        ]);

        // Si hay una imagen, procesarla y obtener la ruta para guardarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        Bebida::create($validatedData);
        return redirect('/bebidas')->with('success', 'Bebida creada con éxito.');
    }

    // Muestra una bebida específica.
    public function show(Bebida $bebida)
    {
        return view('bebidas.show', compact('bebida'));
    }

    // Muestra el formulario para editar una bebida existente.
    public function edit(Bebida $bebida)
    {
        return view('bebidas.edit', compact('bebida'));
    }

    // Actualiza una bebida en la base de datos.
    public function update(Request $request, Bebida $bebida)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'nullable|max:30',
            'imagen' => 'nullable|image|max:1024',
            'estado' => 'required|boolean',
        ]);

        // Si hay una nueva imagen, procesarla y obtener la ruta para guardarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('public/imagenes');
            $validatedData['imagen'] = $imagenPath;
        }

        $bebida->update($validatedData);
        return redirect('/bebidas')->with('success', 'Bebida actualizada con éxito.');
    }

    // Elimina una bebida de la base de datos.
    public function destroy(Bebida $bebida)
    {
        $bebida->delete();
        return redirect('/bebidas')->with('success', 'Bebida eliminada con éxito.');
    }
}
