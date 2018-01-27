@extends('layouts.site')
@section('content')
    <h1>{{ Auth::user()->name }}</h1>
    <h2>{{ Auth::user()->email }}</h2>
    <p>{{ Auth::user()->tickets }} <b>tickets</b></p>
    <table>
        <thead>
            <th>Time</th>
            <th>Name</th>
            <th>Amount</th>
        </thead>
        <tbody>
        @foreach($raffles as $raffle)
            <tr style="text-align: center">
                <td>{{$raffle->updated_at}}</td>
                <td>{{get_name($raffle->raffle_id)}}</td>
                <td>{{$raffle->amount}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection