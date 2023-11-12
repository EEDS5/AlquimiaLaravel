<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /// Muestra una lista de todos los usuarios.
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Muestra el formulario para crear un nuevo usuario.
    public function create()
    {
        return view('usuarios.create');
    }

    // Almacena un nuevo usuario en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:50|unique:usuarios',
            'contraseña' => 'required|min:8',
            'estado' => 'required|boolean',
        ]);

        $validatedData['contraseña'] = bcrypt($validatedData['contraseña']); // Encripta la contraseña antes de guardar.

        Usuario::create($validatedData);
        return redirect('/usuarios')->with('success', 'Usuario creado con éxito.');
    }

    // Muestra un usuario específico.
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Muestra el formulario para editar un usuario existente.
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualiza un usuario en la base de datos.
    public function update(Request $request, Usuario $usuario)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:50|unique:usuarios,username,'.$usuario->id,
            'contraseña' => 'sometimes|min:8',
            'estado' => 'required|boolean',
        ]);

        if ($request->filled('contraseña')) {
            $validatedData['contraseña'] = bcrypt($validatedData['contraseña']);
        } else {
            unset($validatedData['contraseña']);
        }

        $usuario->update($validatedData);
        return redirect('/usuarios')->with('success', 'Usuario actualizado con éxito.');
    }

    // Elimina un usuario de la base de datos.
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('/usuarios')->with('success', 'Usuario eliminado con éxito.');
    }
}
