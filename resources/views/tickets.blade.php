@extends('layouts.site')
@section('content')
    <h1>Currently you have {{ Auth::user()->tickets }} tickets</h1>
    @if ($message = Session::get('success'))
            {!! $message !!}
        <?php Session::forget('success');?>
    @endif
    @if ($message = Session::get('error'))
            {!! $message !!}
        <?php Session::forget('error');?>
    @endif
    <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
        {{ csrf_field() }}
        <h2>10 tickets</h2>
        <input type="text" hidden name="name" value="10 tickets">
        <input type="text" hidden name="description" value="10 tickets to raffles on hyperaffle.com">
        <input type="number" hidden name="tickets" value="10">
        <input type="number" hidden name="amount"  value="20">
        <button type="submit">Buy</button>
    </form>

    <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
        {{ csrf_field() }}
        <h2>25 tickets</h2>
        <input type="text" hidden name="name" value="25 tickets">
        <input type="text" hidden name="description" value="25 tickets to raffles on hyperaffle.com">
        <input type="number" hidden name="tickets" value="25">
        <input type="number" hidden name="amount"  value="35">
        <button type="submit">Buy</button>
    </form>

    <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
        {{ csrf_field() }}
        <h2>50 tickets</h2>
        <input type="text" hidden name="name" value="50 tickets">
        <input type="text" hidden name="description" value="50 tickets to raffles on hyperaffle.com">
        <input type="number" hidden name="tickets" value="50">
        <input type="number" hidden name="amount"  value="50">
        <button type="submit">Buy</button>
    </form>

    <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}" >
        {{ csrf_field() }}
        <h2>100 tickets</h2>
        <input type="text" hidden name="name" value="100 tickets">
        <input type="text" hidden name="description" value="100 tickets to raffles on hyperaffle.com">
        <input type="number" hidden name="tickets" value="100">
        <input type="number" hidden name="amount"  value="75">
        <button type="submit">Buy</button>
    </form>
@endsection