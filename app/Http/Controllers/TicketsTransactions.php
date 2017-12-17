<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\TicketsTransaction;

class TicketsTransactions extends Controller
{
    public function index()
    {
        $transactions = TicketsTransaction::all();
        return view('admin.tickets_transactions', compact('transactions'));
    }
}
