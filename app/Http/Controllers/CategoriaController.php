<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Muestra una lista de todas las categorías.
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Muestra el formulario para crear una nueva categoría.
    public function create()
    {
        return view('categorias.create');
    }

    // Almacena una nueva categoría en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
            'estado' => 'required|boolean',
        ]);

        Categoria::create($validatedData);
        return redirect('/categorias')->with('success', 'Categoría creada con éxito.');
    }

    // Muestra una categoría específica.
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // Muestra el formulario para editar una categoría existente.
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualiza una categoría en la base de datos.
    public function update(Request $request, Categoria $categoria)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
            'estado' => 'required|boolean',
        ]);

        $categoria->update($validatedData);
        return redirect('/categorias')->with('success', 'Categoría actualizada con éxito.');
    }

    // Elimina una categoría de la base de datos.
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect('/categorias')->with('success', 'Categoría eliminada con éxito.');
    }
}
