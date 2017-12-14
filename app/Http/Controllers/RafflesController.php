<?php

namespace App\Http\Controllers;

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
        $raffle->save();

        $request->file('thumb')->move($path, $thumb_name);

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
            unlink($file); // delete file
        }

        rmdir($path);// delete directorty
        $raffle->delete();
        return redirect()->route('admin.raffles');
    }
}
