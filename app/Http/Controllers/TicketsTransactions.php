<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TicketsTransaction;
use Illuminate\Support\Facades\DB;

class TicketsTransactions extends Controller
{
    public function index()
    {
        $transactions = DB::table('tickets_transactions')->paginate(5);
        return view('admin.tickets_transactions', compact('transactions'));
    }
}
