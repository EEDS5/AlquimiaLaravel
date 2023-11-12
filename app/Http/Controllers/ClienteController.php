<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra una lista de todos los clientes.
    public function index()
    {
        $clientes = Cliente::with('persona')->get();
        return view('clientes.index', compact('clientes'));
    }

    // Muestra el formulario para crear un nuevo cliente.
    public function create()
    {
        return view('clientes.create');
    }

    // Almacena un nuevo cliente en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'razon_social' => 'nullable|max:50',
            'nit' => 'nullable|max:50',
        ]);

        Cliente::create($validatedData);
        return redirect('/clientes')->with('success', 'Cliente creado con éxito.');
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
