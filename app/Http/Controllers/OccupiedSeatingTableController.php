<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OccupiedSeatingTable;

class OccupiedSeatingTableController extends Controller
{
    public function index()
    {
        $occupiedTables = OccupiedSeatingTable::all();
        return view('occupiedSeatingTable.index', ['occupiedTables' => $occupiedTables]);
    }

    public function create()
    {
        return view('occupiedSeatingTable.create');
    }

    public function store(Request $request)
    {
        $occupiedTable = OccupiedSeatingTable::create($request->all());
        return redirect()->route('occupiedSeatingTable.index');
    }

    public function show(string $id)
    {
        $occupiedTable = OccupiedSeatingTable::find($id);
        return view('occupiedSeatingTable.show', ['occupiedTable' => $occupiedTable]);
    }

    public function edit(string $id)
    {
        $occupiedTable = OccupiedSeatingTable::find($id);
        return view('occupiedSeatingTable.edit', ['occupiedTable' => $occupiedTable]);
    }

    public function update(Request $request, string $id)
    {
        $occupiedTable = OccupiedSeatingTable::find($id);
        $occupiedTable->update($request->all());
        return redirect()->route('occupiedSeatingTable.index');
    }

    public function destroy(string $id)
    {
        $occupiedTable = OccupiedSeatingTable::find($id);
        $occupiedTable->delete();
        return redirect()->route('occupiedSeatingTable.index');
    }

}
