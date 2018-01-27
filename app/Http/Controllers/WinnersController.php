<?php

namespace App\Http\Controllers;

use App\Raffle;
use App\User;
use App\Winner;
use Illuminate\Http\Request;

class WinnersController extends Controller
{
    public function shipped(Raffle $raffle)
    {
        $raffle->shipped = 1;
        $raffle->save();
        return back();
    }

    public function archive()
    {
        $winners = Raffle::where('shipped', 1)->get();

        return view('winners', compact('winners'));
    }

    public function show(Raffle $raffle)
    {
        $user = User::where('id', $raffle->winner)->first();

        return view('winnershow', compact('user', 'raffle'));
    }
}
