<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    $inventory = Inventory::where('inventory_id', $request->inventory_id)->firstOrFail();

    if ($inventory->total < $request->quantity) {
        return back()->withErrors(['quantity' => 'Stok tidak mencukupi']);
    }

    Loan::create([
        'user_id' => Auth::id(),
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

    return redirect()->route('loans.create')->with('success', 'Peminjaman berhasil');
}


    // ⬇ Fungsi pengembalian
    public function returns()
{
    
    if (Auth::user()->is_admin) {
        $loans = Loan::where('status', 'Dipinjam')
                     ->with('inventory', 'user')
                     ->get();
    } else {
        $loans = Loan::where('status', 'Dipinjam')
                     ->where('user_id', Auth::id())
                     ->with('inventory')
                     ->get();
    }

    return view('loans.returns', compact('loans'));
}


    public function returnLoan(Request $request, Loan $loan)
{
    if (!Auth::user()->is_admin && $loan->user_id !== Auth::id()) {
        abort(403, 'Kamu tidak boleh mengembalikan barang ini.');
    }

    $request->validate([
        'return_date' => 'required|date',
    ]);

    $loan->return_date = $request->return_date;
    $loan->status = 'Dikembalikan';
    $loan->save();

    $inventory = Inventory::where('inventory_id', $loan->inventory_id)->first();
    if ($inventory) {
        $inventory->total += $loan->quantity;
        $inventory->status = 'Tersedia';
        $inventory->save();
    }

    return redirect()->route('loans.returns')->with('success', 'Pengembalian berhasil');
}


}
