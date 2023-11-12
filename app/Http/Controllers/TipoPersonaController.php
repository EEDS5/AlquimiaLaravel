<?php

namespace App\Http\Controllers;

use App\Models\TipoPersona;
use Illuminate\Http\Request;

class TipoPersonaController extends Controller
{
    public function index()
    {
        $tipos = TipoPersona::all();
        return view('tipopersona.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipopersona.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
        ]);

        TipoPersona::create($validatedData);
        return redirect('/tipopersonas')->with('success', 'Tipo de persona creado con éxito.');
    }

    public function show(TipoPersona $tipopersona)
    {
        return view('tipopersona.show', compact('tipopersona'));
    }

    public function edit(TipoPersona $tipopersona)
    {
        return view('tipopersona.edit', compact('tipopersona'));
    }

    public function update(Request $request, TipoPersona $tipopersona)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|max:50',
        ]);

        $tipopersona->update($validatedData);
        return redirect('/tipopersonas')->with('success', 'Tipo de persona actualizado con éxito.');
    }

    public function destroy(TipoPersona $tipopersona)
    {
        $tipopersona->delete();
        return redirect('/tipopersonas')->with('success', 'Tipo de persona eliminado con éxito.');
    }
}
