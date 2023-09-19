<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $menu = new Menu([
            'servingTurnId' => $request->get('servingTurnId'),
            'menuDescription' => $request->get('menuDescription'),
            'isOpen' => $request->get('isOpen')
        ]);

        $menu->save();
        return redirect('/menus')->with('success', 'Menu saved!');
    }

    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->servingTurnId = $request->get('servingTurnId');
        $menu->menuDescription = $request->get('menuDescription');
        $menu->isOpen = $request->get('isOpen');

        $menu->save();
        return redirect('/menus')->with('success', 'Menu updated!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('/menus')->with('success', 'Menu deleted!');
    }
}
