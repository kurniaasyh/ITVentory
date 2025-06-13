<?php
namespace App\Http\Controllers;

use App\Models\Inventory;

class DashboardController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('dashboard', compact('inventories'));
    }
}