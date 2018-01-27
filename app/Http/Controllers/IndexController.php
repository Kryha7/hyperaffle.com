<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTicketsRequest;
use App\Raffle;
use App\TicketsTransaction;
use App\TicketsTransactions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raffles = Raffle::where('active', 1)->get();
        return view('index', compact('raffles'));
    }

    public function add_tickets(Raffle $raffle, AddTicketsRequest $request)
    {
        $user = $request->user();

        $check_transaction = TicketsTransaction::where('raffle_id', $raffle->id)->get();
        foreach ($check_transaction as $check)
        {
            if ($check->user_id == $user->id)
            {
                \Session::put('error2','Wziales juz udzial');
                return back();
            }
        }


        $tickets = $raffle->tickets + $request->tickets;
        if ($request->tickets <= $user->tickets && $tickets <= $raffle->max_tickets)
        {
            $user->tickets = $user->tickets - $request->tickets;
            $user->save();

            $raffle->tickets = $tickets;
            $raffle->save();

            $transaction = new TicketsTransaction();
            $transaction->raffle_id = $raffle->id;
            $transaction->user_id = $user->id;
            $transaction->amount = $request->tickets;

            $transaction->save();

            \Session::put('success','Added tickets');
            return back();
        }
        else
        {
            \Session::put('error','Validation');
            return back();
        }
    }
}
