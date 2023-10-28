<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlateServing;

class PlateServingController extends Controller
{
    public function index()
    {
        $plateServings = PlateServing::all();
        return view('plateServing.index', ['plateServings' => $plateServings]);
    }

    public function create()
    {
        return view('plateServing.create');
    }

    public function store(Request $request)
    {
        $plateServing = PlateServing::create($request->all());
        return redirect()->route('plateServing.index');
    }

    public function show(string $id)
    {
        $plateServing = PlateServing::find($id);
        return view('plateServing.show', ['plateServing' => $plateServing]);
    }

    public function edit(string $id)
    {
        $plateServing = PlateServing::find($id);
        return view('plateServing.edit', ['plateServing' => $plateServing]);
    }

    public function update(Request $request, string $id)
    {
        $plateServing = PlateServing::find($id);
        $plateServing->update($request->all());
        return redirect()->route('plateServing.index');
    }

    public function destroy(string $id)
    {
        $plateServing = PlateServing::find($id);
        $plateServing->delete();
        return redirect()->route('plateServing.index');
    }

}
