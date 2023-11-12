<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Muestra una lista de todos los menús.
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    // Muestra el formulario para crear un nuevo menú.
    public function create()
    {
        return view('menus.create');
    }

    // Almacena un nuevo menú en la base de datos.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required|boolean',
        ]);

        Menu::create($validatedData);
        return redirect('/menus')->with('success', 'Menú creado con éxito.');
    }

    // Muestra un menú específico.
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    // Muestra el formulario para editar un menú existente.
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // Actualiza un menú en la base de datos.
    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required|boolean',
        ]);

        $menu->update($validatedData);
        return redirect('/menus')->with('success', 'Menú actualizado con éxito.');
    }

    // Elimina un menú de la base de datos.
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('/menus')->with('success', 'Menú eliminado con éxito.');
    }
}
