<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatingTable;

class SeatingTableController extends Controller
{
    public function index()
    {
        $tables = SeatingTable::all();
        return view('seatingTable.index', ['tables' => $tables]);
    }

    public function create()
    {
        return view('seatingTable.create');
    }

    public function store(Request $request)
    {
        $table = SeatingTable::create($request->all());
        return redirect()->route('seatingTable.index');
    }

    public function show(string $id)
    {
        $table = SeatingTable::find($id);
        return view('seatingTable.show', ['table' => $table]);
    }

    public function edit(string $id)
    {
        $table = SeatingTable::find($id);
        return view('seatingTable.edit', ['table' => $table]);
    }

    public function update(Request $request, string $id)
    {
        $table = SeatingTable::find($id);
        $table->update($request->all());
        return redirect()->route('seatingTable.index');
    }

    public function destroy(string $id)
    {
        $table = SeatingTable::find($id);
        $table->delete();
        return redirect()->route('seatingTable.index');
    }

}
