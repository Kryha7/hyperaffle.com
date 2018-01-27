<?php

namespace App\Http\Controllers;

use App\TicketsTransaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RafflesRequest;
use App\Raffle;

class RafflesController extends Controller
{
    public function index()
    {
        $raffles = Raffle::all();
        return view('admin.raffles', compact('raffles'));
    }

    public function create()
    {
        return view('admin.raffle.create');
    }

    public function edit(Raffle $raffle)
    {
        return view('admin.raffle.edit', compact('raffle'));
    }

    public function store(RafflesRequest $request)
    {
        $raffle = new Raffle();
        $raffle->main = $request->input('main');
        $raffle->brand = $request->input('brand');
        $raffle->title = $request->input('title');
        $raffle->max_tickets = $request->input('max_tickets');
        $raffle->tickets = 0;
        $raffle->active = 1;
        $raffle->shipped = 0;
        $raffle->thumb = 997;
        $raffle->save();

        $path = base_path().'/public/images/'.$raffle->id;
        mkdir($path, 0777);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $charactersLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $thumb_name = $randomString.'.'.$request->file('thumb')->getClientOriginalExtension();

        $raffle->thumb = $thumb_name;

        $request->file('thumb')->move($path, $thumb_name);

        $count = count($request->images);
        $ext = 0;

        for ($int = 0; $int < $count; $int++)
        {
            $image = $request->images[$int];

            $image_name = ($randomString.$ext).'.'.$image->getClientOriginalExtension();
            $image->move($path, $image_name);
            $ext++;
        }

        $raffle->save();

        return redirect()->route('admin.raffles');
    }

    public function update(RafflesRequest $request, Raffle $raffle)
    {
        $raffle->brand = $request->input('brand');
        $raffle->title = $request->input('title');
        $raffle->max_tickets = $request->input('max_tickets');
        $raffle->save();
        return redirect()->route('admin.raffles');
    }

    public function delete(Raffle $raffle)
    {
        $path = base_path().'/public/images/'.$raffle->id;  
        
        $files = glob(base_path().'/public/images/'.$raffle->id.'/*'); // get all file names
        foreach($files as $file){ // iterate files
          if(is_file($file))
            unlink($file); // delete file from directory
        }

        rmdir($path);// delete directory
        $raffle->delete();
        return redirect()->route('admin.raffles');
    }

    public function raffle_winner(Raffle $raffle)
    {
        if ($raffle->active == 1)
        {
            $transactions = TicketsTransaction::where('raffle_id', $raffle->id)->get();
            $basket = array();

            foreach ($transactions as $transaction)
            {
                for ($i = 0; $i < $transaction->amount; $i++)
                {
                    array_push($basket, $transaction->user_id);
                }
            }

            $winner = $basket[rand(0, $raffle->max_tickets-1)];

            $raffle->winner = $winner;
            $raffle->active = 0;
            $raffle->save();

            return back();
        }
        else
        {
            return back();
        }
    }

    public function show_winner(Raffle $raffle)
    {
        $user = User::where('id', $raffle->winner)->first();

        return view('admin.raffle.winner', compact('user'));
    }

    public function winners()
    {
        $raffles = Raffle::where('active', 0)->get();
        return view('admin.winners', compact('raffles'));
    }
}
