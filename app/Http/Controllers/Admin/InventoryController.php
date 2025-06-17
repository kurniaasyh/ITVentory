<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('admin.inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('admin.inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total' => 'required|integer',
            'status' => 'required|string'
        ]);

        Inventory::create($request->all());

        return redirect()->route('admin.inventories.index')->with('success', 'Item successfully added!');
    }

    public function edit(Inventory $inventory)
    {
        return view('admin.inventories.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total' => 'required|integer',
            'status' => 'required|string'
        ]);

        $inventory->update($request->all());

        return redirect()->route('admin.inventories.index')->with('success', 'Item successfully updated!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('admin.inventories.index')->with('success', 'Item successfully deleted!');
    }
}
