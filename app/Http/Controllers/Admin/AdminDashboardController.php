<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Loan;
use App\Models\Notification;

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

    public function notifications()
    {
        $notifications = Notification::where('role_tujuan', 'admin')
            ->orderBy('created_at', 'desc')
            ->get();

        $recentLoans = Loan::with('user', 'inventory')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Mark notifications as read
        Notification::where('role_tujuan', 'admin')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('admin.notifications', compact('notifications', 'recentLoans'));
    }
}
