@extends('layouts.site')
@section('content')
    <div class="payment-info">
        <p>Payment authorized by paypal.</p>
    </div>
        @if ($message = Session::get('success'))
            <div class="ticket-info info-success">
                <p>{{$message}}</p>
            </div>
            <?php Session::forget('success');?>
        @endif
        @if ($message = Session::get('error'))
            <div class="ticket-info info-error">
                <p>{{$message}}</p>
            </div>
            <?php Session::forget('error');?>
        @endif
    <div class="tickets">
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">1.99$</div>
                <div class="tickets-amount">1 ticket</div>
                <input type="text" hidden name="name" value="1 ticket">
                <input type="text" hidden name="description" value="1 ticket on hyperaffle.com">
                <input type="number" hidden name="tickets" value="1">
                <input type="number" hidden name="amount" value="1.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">19.99$</div>
                <div class="tickets-amount">10 tickets</div>
                <input type="text" hidden name="name" value="10 tickets">
                <input type="text" hidden name="description" value="10 tickets on hyperaffle.com">
                <input type="number" hidden name="tickets" value="10">
                <input type="number" hidden name="amount" value="19.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">24.99$</div>
                <div class="tickets-amount">25 tickets</div>
                <input type="text" hidden name="name" value="25 tickets">
                <input type="text" hidden name="description" value="25 tickets on hyperaffle.com">
                <input type="number" hidden name="tickets" value="25">
                <input type="number" hidden name="amount" value="24.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">99.99$</div>
                <div class="tickets-amount">50 tickets</div>
                <input type="text" hidden name="name" value="50 tickets">
                <input type="text" hidden name="description" value="50 tickets on hyperaffle.com">
                <input type="number" hidden name="tickets" value="50">
                <input type="number" hidden name="amount" value="99.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">199.99$</div>
                <div class="tickets-amount">100 tickets</div>
                <input type="text" hidden name="name" value="100 tickets">
                <input type="text" hidden name="description" value="100 tickets on hyperaffle.com">
                <input type="number" hidden name="tickets" value="100">
                <input type="number" hidden name="amount" value="199.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
        <div class="ticket">
            <form method="POST" id="payment-form" role="form" action="{{route('paypal')}}">
                {{ csrf_field() }}
                <div class="price">299.99$</div>
                <div class="tickets-amount">200 tickets</div>
                <input type="text" hidden name="name" value="200 tickets">
                <input type="text" hidden name="description" value="200 tickets on hyperaffle.com">
                <input type="number" hidden name="tickets" value="200">
                <input type="number" hidden name="amount" value="299.99">
                <input type="submit" class="submit" value="Buy">
            </form>
        </div>
    </div>
@endsection