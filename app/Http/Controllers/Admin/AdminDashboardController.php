<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Loan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $recentLoans = Loan::with(['user', 'inventory'])
                            ->orderByDesc('created_at')
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact('recentLoans'));
    }
    
}

