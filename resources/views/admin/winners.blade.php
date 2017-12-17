@extends('layouts.admin')
@section('content')
    <h1>Winners</h1>
    <ul>
        @foreach($raffles as $raffle)
            @if(!empty($raffle->winner))
                <li>{{$raffle->brand}} {{$raffle->title}} | User id: {{$raffle->winner}}</li>
            @endif
        @endforeach
    </ul>
@endsection