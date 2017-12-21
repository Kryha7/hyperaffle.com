<?php

namespace App\Http\Controllers;

use App\PayPalTransaction;
use Illuminate\Http\Request;

class PaymentTransactions extends Controller
{
    public function index()
    {
        $transactions = PayPalTransaction::all();
        return view('admin.payment_transactions', compact('transactions'));
    }
}
