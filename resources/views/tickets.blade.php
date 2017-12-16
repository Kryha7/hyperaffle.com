@extends('layouts.site')
@section('content')
    <h1>Currently you have {{ Auth::user()->tickets }} tickets</h1>
    <ul>
        <li>10 tickets <button>Buy</button></li>
        <li>25 tickets <button>Buy</button></li>
        <li>50 tickets <button>Buy</button></li>
        <li>100 tickets <button>Buy</button></li>
    </ul>
@endsection