<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTicketsRequest;
use App\Raffle;
use App\TicketsTransactions;
use Illuminate\Http\Request;

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
        $tickets = $raffle->tickets + $request->tickets;
        if ($request->tickets <= $user->tickets && $tickets <= $raffle->max_tickets)
        {
            $user->tickets = $user->tickets - $request->tickets;
            $user->save();

            $raffle->tickets = $tickets;
            $raffle->save();

            $transaction = new TicketsTransactions();
            $transaction->raffle_id = $raffle->id;
            $transaction->user_id = $user->id;
            $transaction->amount = $request->tickets;

            $transaction->save();

            return back();
        }
        else
        {
            echo 'validation dzizal';
        }
    }
}
