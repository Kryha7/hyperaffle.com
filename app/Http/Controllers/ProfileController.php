<?php

namespace App\Http\Controllers;

use App\PayPalTransaction;
use App\TicketsTransaction;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $raffles = TicketsTransaction::where('user_id', $user->id)->get();

        return view('profile', compact('raffles'));
    }

    public function tickets()
    {
        return view('tickets');
    }
}
