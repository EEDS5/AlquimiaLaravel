<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Muestra una lista de todas las categorías.
    public function index()
    {
        // $categorias = Categoria::all();
        // return view('categorias.index', compact('categorias'));
        // Asegúrate de que solo se retornen las categorías activas si es necesario
        $categorias = Categoria::where('estado', true)->get();
        return response()->json($categorias);
    }

    // Muestra el formulario para crear una nueva categoría.
    public function create()
    {
        return view('categorias.create');
    }

    // Almacena una nueva categoría en la base de datos.
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'descripcion' => 'required|max:50',
                'estado' => 'required|boolean',
            ]);

            Categoria::create($validatedData);
            return redirect('/categorias')->with('success', 'Categoría creada con éxito.');
        } catch (\Exception $e) {
            return redirect('/categorias')->with('error', 'Hubo un error al crear la categoría: ' . $e->getMessage());
        }
    }

    // Muestra el formulario para editar una categoría existente.
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Actualiza una categoría en la base de datos.
    public function update(Request $request, Categoria $categoria)
    {
        try {
            $validatedData = $request->validate([
                'descripcion' => 'required|max:50',
                'estado' => 'required|boolean',
            ]);

            $categoria->update($validatedData);
            return redirect('/categorias')->with('success', 'Categoría actualizada con éxito.');
        } catch (\Exception $e) {
            return redirect('/categorias')->with('error', 'Hubo un error al actualizar la categoría: ' . $e->getMessage());
        }
    }

    // Elimina una categoría de la base de datos.
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            return redirect('/categorias')->with('success', 'Categoría eliminada con éxito.');
        } catch (\Exception $e) {
            return redirect('/categorias')->with('error', 'Hubo un error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}

