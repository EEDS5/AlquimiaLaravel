<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::where('estado', 1)->get();
        return view('platos.index', compact('platos'));
    }

    // Muestra el formulario para crear un nuevo plato
    public function create()
    {
        return view('platos.create');
    }

    // Guarda un nuevo plato en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:platos',
            'descripcion' => 'nullable|max:100',
            'imagen' => 'nullable|image', // 1MB Max
        ]);

        $plato = new Plato($request->only(['nombre', 'descripcion']));

        $plato->estado = 1;

        if ($request->hasFile('imagen')) {
            $plato->imagen = $request->file('imagen')->store('platos', 'public');
        }
        

        $plato->save();

        return redirect()->route('platos.index')->with('success', 'Plato creado con éxito.');
    }

    // Muestra un plato específico
    public function show(Plato $plato)
    {
        return view('platos.show', compact('plato'));
    }

    // Muestra el formulario para editar un plato existente
    public function edit(Plato $plato)

    {
        return view('platos.edit', compact('plato'));
    }

    // Actualiza un plato en la base de datos
    public function update(Request $request, Plato $plato)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required|max:255|unique',
        'descripcion' => 'required',
        'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg', // Valida que el archivo sea una imagen
    ]);

    // Rellenar el plato con los datos validados excepto la imagen
    $plato->fill($validatedData);

    // Verificar si se cargó una nueva imagen
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen antigua si existe y no es una URL externa
        if ($plato->imagen && !filter_var($plato->imagen, FILTER_VALIDATE_URL)) {
            Storage::delete($plato->imagen);
        }
        
        // Almacenar la nueva imagen y actualizar la ruta de la imagen en el modelo
        $plato->imagen = $request->file('imagen')->store('platos', 'public');
    }

    // Guardar los cambios en la base de datos
    $plato->save();

    // Redireccionar al usuario con un mensaje de éxito
    return redirect()->route('platos.index')->with('success', 'Plato actualizado con éxito.');
}


    // Elimina un plato de la base de datos
    public function destroy(Plato $plato)
    {
        // Cambiar el estado del plato a 0 (inactivo)
        $plato->estado = 0;
        
        // Guardar el cambio en la base de datos
        $plato->save();

        // Redireccionar al usuario con un mensaje de éxito
        return redirect()->route('platos.index')->with('success', 'Plato inactivado con éxito.');
    }
}
