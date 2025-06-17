<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalItems = Inventory::count();
        return view('admin.dashboard', compact('totalItems'));
    }
}

