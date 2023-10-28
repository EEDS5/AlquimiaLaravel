<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminToken;

class AdminTokenController extends Controller
{
    public function index()
    {
        $adminTokens = AdminToken::all();
        return view('adminToken.index', ['adminTokens' => $adminTokens]);
    }

    public function create()
    {
        return view('adminToken.create');
    }

    public function store(Request $request)
    {
        $adminToken = AdminToken::create($request->all());
        return redirect()->route('adminToken.index');
    }

    public function show(string $id)
    {
        $adminToken = AdminToken::find($id);
        return view('adminToken.show', ['adminToken' => $adminToken]);
    }

    public function edit(string $id)
    {
        $adminToken = AdminToken::find($id);
        return view('adminToken.edit', ['adminToken' => $adminToken]);
    }

    public function update(Request $request, string $id)
    {
        $adminToken = AdminToken::find($id);
        $adminToken->update($request->all());
        return redirect()->route('adminToken.index');
    }

    public function destroy(string $id)
    {
        $adminToken = AdminToken::find($id);
        $adminToken->delete();
        return redirect()->route('adminToken.index');
    }

}
