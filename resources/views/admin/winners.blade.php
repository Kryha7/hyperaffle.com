@extends('layouts.admin')
@section('content')
    <h1>Winners</h1>
    <ul>
        @foreach($raffles as $raffle)
            @if(!empty($raffle->winner))
                <li>{{$raffle->brand}} {{$raffle->title}} | User id: {{$raffle->winner}} |
                    @if($raffle->shipped == 0)
                        Not shipped | <a href="{{route('admin.winner.shipped', $raffle)}}">Shipped</a>
                    @else
                        Shipped
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
@endsection