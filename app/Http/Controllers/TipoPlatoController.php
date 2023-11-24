<?php

namespace App\Http\Controllers;

use App\Models\TipoPlato;
use Illuminate\Http\Request;

class TipoPlatoController extends Controller
{
    // ...


    public function index()
    {
        // $tipoPlatos = TipoPlato::all();
        // return view('tipoPlatos.index', compact('tipoPlatos'));
        // Asegúrate de que solo se retornen los tipos de platos activos si es necesario
        $tipoPlatos = TipoPlato::where('estado', true)->get();
        return response()->json($tipoPlatos);
    }


    // Método para crear un nuevo tipo de plato.
    public function create()
    {
        return view('tipoPlatos.create');
    }

    // Método para almacenar un nuevo tipo de plato en la base de datos.
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|max:50',
                'descripcion' => 'nullable|max:100',
                'estado' => 'required|boolean',
            ]);

            TipoPlato::create($validatedData);

            return redirect('/tipoPlatos')->with('success', 'Tipo de plato creado con éxito.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/tipoPlatos')->with('error', 'Hubo un error al crear el tipo de plato.');
        };
    }

    // Método para editar un tipo de plato existente.
    public function edit(TipoPlato $tipoPlato)
    {
        return view('tipoPlatos.edit', compact('tipoPlato'));
    }

    // Método para actualizar un tipo de plato en la base de datos.
    public function update(Request $request, TipoPlato $tipoPlato)
    {
        try {
            $validatedData = $request->validate([
                'nombre' => 'required|max:50',
                'descripcion' => 'nullable|max:100',
                'estado' => 'required|boolean',
            ]);

            $tipoPlato->update($validatedData);

            return redirect('/tipoPlatos')->with('success', 'Tipo de plato actualizado con éxito.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/tipoPlatos')->with('error', 'Hubo un error al actualizar el tipo de plato.');
        }
    }

    // Método para eliminar un tipo de plato de la base de datos.
    public function destroy(TipoPlato $tipoPlato)
    {
        try {
            $tipoPlato->delete();

            return redirect('/tipoPlatos')->with('success', 'Tipo de plato eliminado con éxito.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/tipoPlatos')->with('error', 'Hubo un error al eliminar el tipo de plato.');
        }
    }
}
