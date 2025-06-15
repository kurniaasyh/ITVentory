<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function create()
    {
        $inventories = Inventory::where('status', 'Tersedia')->get();
        return view('loans.create', compact('inventories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventories,inventory_id',
            'quantity' => 'required|integer|min:1',
            'borrow_date' => 'required|date',
        ]);

        $inventory = Inventory::findOrFail($request->inventory_id);

        if ($inventory->total < $request->quantity) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi']);
        }

        Loan::create([
            'inventory_id' => $request->inventory_id,
            'quantity' => $request->quantity,
            'borrow_date' => $request->borrow_date,
            'status' => 'Dipinjam',
        ]);

        $inventory->total -= $request->quantity;
        if ($inventory->total == 0) {
            $inventory->status = 'Kosong';
        }
        $inventory->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil');
    }
}
