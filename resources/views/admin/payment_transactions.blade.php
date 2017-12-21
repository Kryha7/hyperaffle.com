@extends('layouts.admin')
@section('content')
    <h1>Payment transactions</h1>
    <ul>
        @foreach($transactions as $transaction)
            <li>{{$transaction->id}} | {{$transaction->payment_id}} | {{$transaction->user_id}} | {{$transaction->tickets_amount}} tickets</li>
        @endforeach
    </ul>
@endsection