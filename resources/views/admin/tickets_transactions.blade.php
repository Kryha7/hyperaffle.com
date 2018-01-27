@extends('layouts.admin')
@section('content')
    <h1>Tickets transactions</h1>
    <ul>
        @foreach($transactions as $transaction)
            <li>{{$transaction->id}} | {{$transaction->raffle_id}} | {{$transaction->user_id}} | {{$transaction->amount}} tickets</li>
        @endforeach
    </ul>
    {{$transactions->links()}}
@endsection
