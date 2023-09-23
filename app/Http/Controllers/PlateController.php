<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plate;

class PlateController extends Controller
{
    public function index()
    {
        $plates = Plate::all();
        //return $plates;
        return view('plate.index', compact('plates'));
    }

    public function create()
    {
        return view('plate.create');
    }

    public function store(Request $request)
    {
        $plate = new Plate([
        'plateName' => $request->get('plateName'),
        'defaultPrice' => $request->get('defaultPrice'),
        'descriptionShort' => $request->get('descriptionShort'),
        'descriptionLong' => $request->get('descriptionLong'),
        'frozen' => $request->has('frozen') ? 1 : 0  // Assuming 'frozen' is a checkbox
    ]);

        $plate->save();
        return redirect('/plate')->with('success', 'Plate saved!');
    }

    public function show(Plate $plate)
    {
        return view('plate.show', compact('plate'));
    }

    public function edit(Plate $plate)
    {
        return view('plate.edit', compact('plate'));
    }

    public function update(Request $request, Plate $plate)
    {
        $plate->plateName = $request->get('plateName');
        $plate->defaultPrice = $request->get('defaultPrice');
        $plate->descriptionShort = $request->get('descriptionShort');
        $plate->descriptionLong = $request->get('descriptionLong');

        $plate->save();
        return redirect('/plates')->with('success', 'Plate updated!');
    }

    public function destroy(Plate $plate)
    {
        $plate->delete();
        return redirect('/plates')->with('success', 'Plate deleted!');
    }
}
