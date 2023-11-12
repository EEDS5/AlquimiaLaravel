<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\ComprobanteDePago;
use App\Models\Reserva;
use App\Models\Entrada;
use App\Models\ConsumoBebida;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        return view('pagos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'monto_total' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        Pago::create($validatedData);
        return redirect('/pagos')->with('success', 'Pago creado con éxito.');
    }

    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'monto_total' => 'required|numeric',
            'estado' => 'required|boolean',
        ]);

        $pago->update($validatedData);
        return redirect('/pagos')->with('success', 'Pago actualizado con éxito.');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect('/pagos')->with('success', 'Pago eliminado con éxito.');
    }
}
