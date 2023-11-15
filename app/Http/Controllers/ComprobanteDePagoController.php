<?php

namespace App\Http\Controllers;

use App\Models\ComprobanteDePago;
use App\Models\Pago;
use Illuminate\Http\Request;

class ComprobanteDePagoController extends Controller
{
    public function index()
    {
        $comprobantes = ComprobanteDePago::with('pago')->get();
        return view('comprobantes.index', compact('comprobantes'));
    }

    public function create()
    {
        $pagos = Pago::all();
        return view('comprobantes.create', compact('pagos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'pago_total' => 'required|numeric',
            'estado' => 'required|in:T,E,Q',
            'pago_id' => 'required|exists:pagos,id',
        ]);

        ComprobanteDePago::create($validatedData);
        return redirect('/comprobantes')->with('success', 'Comprobante de pago creado con éxito.');
    }

    public function show(ComprobanteDePago $comprobanteDePago)
    {
        return view('comprobantes.show', compact('comprobanteDePago'));
    }

    public function edit(ComprobanteDePago $comprobanteDePago)
    {
        $pagos = Pago::all();
        return view('comprobantes.edit', compact('comprobanteDePago', 'pagos'));
    }

    public function update(Request $request, ComprobanteDePago $comprobanteDePago)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'pago_total' => 'required|numeric',
            'estado' => 'required|in:T,E,Q',
            'pago_id' => 'required|exists:pagos,id',
        ]);

        $comprobanteDePago->update($validatedData);
        return redirect('/comprobantes')->with('success', 'Comprobante de pago actualizado con éxito.');
    }

    public function destroy(ComprobanteDePago $comprobanteDePago)
    {
        $comprobanteDePago->delete();
        return redirect('/comprobantes')->with('success', 'Comprobante de pago eliminado con éxito.');
    }
}
