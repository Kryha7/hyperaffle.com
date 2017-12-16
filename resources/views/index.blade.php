@extends('layouts.site')
@section('content')
    <ul>
    @foreach($raffles as $raffle)
            <img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" width="100px">
        <li>{{$raffle->brand}} {{$raffle->title}} | {{$raffle->tickets}}/<b>{{$raffle->max_tickets}}</b>
            {!! Form::open(
                array(
                    'route' => ['add_tickets', $raffle],
                           'class' => 'form',
                           'novalidate' => 'novalidate',
                       ))
            !!}
                {!! Form::number('tickets') !!}
                {!! Form::submit('Add tickets') !!}
            {!! Form::close() !!}
        </li>
    @endforeach
    </ul>
@endsection