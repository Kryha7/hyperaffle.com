@extends('layouts.admin')
@section('content')
    <h1>Raffles</h1>
    <ul>
        @foreach($raffles as $raffle)
            <img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" width="300px">
            <li><b>{{$raffle->id}}</b> | {{$raffle->brand}} {{$raffle->title}} | {{$raffle->tickets}}/{{$raffle->max_tickets}} | <a href="{{route('admin.raffle.edit', $raffle)}}">Edit</a> <a href="{{route('admin.raffle.delete', $raffle)}}">Delete</a></li>
        @endforeach
    </ul>
@endsection