<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Cliente;
use App\Models\GestionMenu;
use App\Models\Pago;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['cliente', 'gestionMenu', 'pago'])->get();
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $gestionMenus = GestionMenu::all();
        // Omitir pagos ya que pueden no estar creados al momento de la entrada
        return view('entradas.create', compact('clientes', 'gestionMenus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'gestion_menu_id' => 'required|exists:gestion_menus,id',
            'pago_id' => 'nullable|exists:pagos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required|in:T,N',
        ]);

        Entrada::create($validatedData);
        return redirect('/entradas')->with('success', 'Entrada creada con éxito.');
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', compact('entrada'));
    }

    public function edit(Entrada $entrada)
    {
        $clientes = Cliente::all();
        $gestionMenus = GestionMenu::all();
        return view('entradas.edit', compact('entrada', 'clientes', 'gestionMenus'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'gestion_menu_id' => 'required|exists:gestion_menus,id',
            'pago_id' => 'nullable|exists:pagos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'estado' => 'required|in:T,N',
        ]);

        $entrada->update($validatedData);
        return redirect('/entradas')->with('success', 'Entrada actualizada con éxito.');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return redirect('/entradas')->with('success', 'Entrada eliminada con éxito.');
    }
}
