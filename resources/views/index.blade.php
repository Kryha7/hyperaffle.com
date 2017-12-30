@extends('layouts.site')
@section('content')
    {{--<ul>--}}
    {{--@foreach($raffles as $raffle)--}}
            {{--<img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" width="100px">--}}
        {{--<li>{{$raffle->brand}} {{$raffle->title}} | {{$raffle->tickets}}/<b>{{$raffle->max_tickets}}</b>--}}
            {{--{!! Form::open(--}}
                {{--array(--}}
                    {{--'route' => ['add_tickets', $raffle],--}}
                           {{--'class' => 'form',--}}
                           {{--'novalidate' => 'novalidate',--}}
                       {{--))--}}
            {{--!!}--}}
                {{--{!! Form::number('tickets') !!}--}}
                {{--{!! Form::submit('Add tickets') !!}--}}
            {{--{!! Form::close() !!}--}}
        {{--</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    <div class="featured">
        @foreach($raffles as $raffle)
            @if($raffle->id == 1)
                <div class="main-raffle">
                    <a href="#modal{{$raffle->id}}"><img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" alt="{{$raffle->brand}} {{$raffle->title}}"></a>
                    <div class="wrapper">
                        <span class="title-brand"><b>{{$raffle->brand}} {{$raffle->title}}</b></span><br>
                        <span class="raffle-tickets"><b>{{$raffle->tickets}}</b> / {{$raffle->max_tickets}} tickets</span><br>
                        @if($raffle->tickets != $raffle->max_tickets)
                            <span class="raffle-status" style="color:#008000;"><b>Raffle open</b></span>
                        @elseif($raffle->tickets == $raffle->max_tickets)
                            <span class="raffle-status" style="color:#ff4500;"><b>Raffle closed</b></span>
                        @endif
                    </div>
                </div>
                <div class="remodal" data-remodal-id="modal{{$raffle->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                    @guest
                        <div>
                            <div>
                                <h2>Login to take in</h2>
                            </div>
                            <br>
                            <button data-remodal-action="confirm" class="remodal-login">Login with Facebook</button>
                        </div>
                    @else
                        @if($raffle->tickets != $raffle->max_tickets)
                        <div>
                            @if(Auth::user()->tickets == 1)
                                <h2>Currently you have {{ Auth::user()->tickets }} ticket</h2>
                            @else
                                <h2>Currently you have {{ Auth::user()->tickets }} tickets</h2>
                            @endif
                            <p>{{$raffle->brand}} {{$raffle->title}}</p>
                            <p><b>{{$raffle->tickets}}</b> / {{$raffle->max_tickets}} tickets</p>
                            <div class="tickets-form">
                                <input type="number" class="form-number">
                            </div>
                        </div>
                        <br>
                        <button data-remodal-action="confirm" class="remodal-confirm">Take in</button>
                        @elseif($raffle->tickets == $raffle->max_tickets)
                            <div>
                                <h2>Raffle closed</h2>
                            </div>
                        @endif
                    @endguest
                </div>
            <div class="raffles">
            @else
                <div class="raffle">
                    <a href="#modal{{$raffle->id}}"><img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" alt="{{$raffle->brand}} {{$raffle->title}}"></a>
                    <div class="wrapper">
                        <span class="title-brand"><b>{{$raffle->brand}} {{$raffle->title}}</b></span><br>
                        <span class="raffle-tickets"><b>{{$raffle->tickets}}</b> / {{$raffle->max_tickets}} tickets</span><br>
                                @if($raffle->tickets != $raffle->max_tickets)
                            <span class="raffle-status" style="color:#008000;"><b>Raffle open</b></span>
                                @elseif($raffle->tickets == $raffle->max_tickets)
                            <span class="raffle-status" style="color:#ff4500;"><b>Raffle closed</b></span>
                                @endif
                    </div>
                </div>
                    <div class="remodal" data-remodal-id="modal{{$raffle->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                        @guest
                            <div>
                                <div>
                                    <h2>Login to take in</h2>
                                </div>
                                <br>
                                <button data-remodal-action="confirm" class="remodal-login">Login with Facebook</button>
                            </div>
                        @else
                            @if($raffle->tickets != $raffle->max_tickets)
                                <div>
                                    @if(Auth::user()->tickets == 1)
                                        <h2>Currently you have {{ Auth::user()->tickets }} ticket</h2>
                                    @else
                                        <h2>Currently you have {{ Auth::user()->tickets }} tickets</h2>
                                    @endif
                                    <p>{{$raffle->brand}} {{$raffle->title}}</p>
                                    <p><b>{{$raffle->tickets}}</b> / {{$raffle->max_tickets}} tickets</p>
                                    <div class="tickets-form">
                                        <input type="number" class="form-number">
                                    </div>
                                </div>
                                <br>
                                <button data-remodal-action="confirm" class="remodal-confirm">Take in</button>
                            @elseif($raffle->tickets == $raffle->max_tickets)
                                <div>
                                    <h2>Raffle closed</h2>
                                </div>
                            @endif
                        @endguest
                    </div>
            @endif
        @endforeach
            </div>
    </div>
@endsection