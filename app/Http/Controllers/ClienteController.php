<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra una lista de todos los clientes.
    public function index()
    {
        
        // $clientes = Cliente::with('persona')->get();
        // return view('clientes.index', compact('clientes'));
         return view('auth.register');
    }

    // Muestra el formulario para crear un nuevo cliente.
    public function create()
    {
        return view('clientes.create');
    }

    // Almacena un nuevo cliente en la base de datos.
    public function store(Request $request)
    {
        $request->validate([
            // Reglas de validación para los campos de Persona
            'ci' => 'required|string|max:30|unique:personas',
            'nombre' => 'required|string|max:60|regex:/^[a-zA-Z ]+$/',
            'apellido_p' => 'required|string|max:30|regex:/^[a-zA-Z ]+$/',
            'apellido_m' => 'required|string|max:30|regex:/^[a-zA-Z ]+$/',
            'telefono' => 'required|string|max:30|unique:personas',
            'direccion' => 'required|string|max:50',
            'email' => 'required|string|max:30|unique:personas|email',

            


            // Reglas de validación para los campos de Cliente
            'razon_social' => 'required|string|max:50',
            'nit' => 'required|string|max:50',

            // Reglas de validación para el campo de Usuario
            'username' => 'required|string|max:50|unique:usuarios',
            'password' => 'required|string|max:50|confirmed',
        ]);

       

        // Crear Persona
        $persona = Persona::create([
            'tipo_persona_id' => $request->tipo_persona_id,
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'tipo_persona_id' => 1,
            'estado' => true,

        ]);

        // Verificar si se va a registrar un usuario o un cliente
        if ($request->has('username')) {
            // Crear Usuario
            $usuario = new Usuario([
                'id' => $persona->id, // Asegurarse de que el id de usuario es el mismo que el de persona
                'username' => $request->username,
                'contraseña' => bcrypt($request->password), // Encriptar la contraseña
                'estado' => true,
            ]);
            $usuario->save();
        }

        if ($request->has('razon_social')) {
            // Crear Cliente
            $cliente = new Cliente([
                'id' => $persona->id, // Asegurarse de que el id de cliente es el mismo que el de persona
                'razon_social' => $request->razon_social,
                'nit' => $request->nit,
            ]);
            $cliente->save();
        }

        // Devolver una respuesta adecuada
        return response()->json([
            'message' => 'Registro exitoso',
            'persona' => $persona,
            'usuario' => $usuario ?? null,
            'cliente' => $cliente ?? null,
        ]);

        

        return redirect('welcome')->with('success', 'Cliente registrado con éxito.');


    }

    // Muestra un cliente específico.
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    // Muestra el formulario para editar un cliente existente.
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Actualiza un cliente en la base de datos.
    public function update(Request $request, Cliente $cliente)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'razon_social' => 'nullable|max:50',
            'nit' => 'nullable|max:50',
        ]);

        $cliente->update($validatedData);
        return redirect('/clientes')->with('success', 'Cliente actualizado con éxito.');
    }

    // Elimina un cliente de la base de datos.
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('/clientes')->with('success', 'Cliente eliminado con éxito.');
    }
}
