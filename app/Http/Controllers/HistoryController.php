<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = Loan::where('user_id', Auth::id())->with('inventory')->get();
        return view('history.index', compact('histories'));
    }
}
