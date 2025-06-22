<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;


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
            'role_tujuan' => 'admin',
            'message' => Auth::user()->name . ' mengajukan peminjaman barang: ' . $inventory->name,
            'is_read' => false,
            'user_id' => Auth::id(),
            'inventory_id' => $request->inventory_id,
            'quantity' => $request->quantity,
            'borrow_date' => $request->borrow_date,
            'status' => 'Dipinjam',
        ]);

        // Create notification for admin
        Notification::create([
            'role_tujuan' => 'admin',
            'message' => Auth::user()->name . ' mengajukan peminjaman barang: ' . $inventory->name,
            'is_read' => false,
        ]);

        // Update inventory
        $inventory->total -= $request->quantity;
        if ($inventory->total == 0) {
            $inventory->status = 'Kosong';
        }
        $inventory->save();

        return redirect()->route('loans.create')->with('success', 'Peminjaman berhasil');
    }

    public function approvalIndex()
    {
        $loans = Loan::where('status', 'Dipinjam')->with('user', 'inventory')->get();
        return view('admin.approvals.index', compact('loans'));
    }

    public function approve(Loan $loan)
    {
        $loan->status = 'Disetujui';
        $loan->save();

        $inventory = $loan->inventory;
        if ($inventory) {
            $inventory->total -= $loan->quantity;
            if ($inventory->total <= 0) {
                $inventory->status = 'Kosong';
            }
            $inventory->save();
        }

        Notification::create([
            'user_id' => $loan->user_id,
            'message' => 'Peminjaman Anda telah disetujui. Silakan temui petugas di gudang inventaris TI.',
            'is_read' => false,
        ]);

        return redirect()->back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject(Loan $loan)
    {
        $loan->status = 'Ditolak';
        $loan->save();

        Notification::create([
            'user_id' => $loan->user_id,
            'message' => 'Peminjaman Anda ditolak. Silakan hubungi admin untuk informasi lebih lanjut.',
            'is_read' => false,
        ]);

        return redirect()->back()->with('error', 'Peminjaman ditolak.');
    }


    // ⬇ Fungsi pengembalian
    public function returns()
    {
        if (Auth::user()->is_admin) {
            $loans = Loan::where('status', 'Disetujui')
                ->with('inventory', 'user')
                ->get();
        } else {
            $loans = Loan::where('status', 'Disetujui')
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
