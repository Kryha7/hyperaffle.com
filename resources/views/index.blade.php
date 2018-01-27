@extends('layouts.site')
@section('content')
    <div class="info">

            @if ($message = Session::get('success'))
            <div class="info-success">
                <div class="ticket-info ">
                    <p><b>Added tickets</b></p>
                </div>
                <?php Session::forget('success');?>
            </div>
            @endif

            @if ($message = Session::get('error'))
                    <div class="info-error">
                <div class="ticket-info">
                    <p><b>You can't add more tickes</b></p>
                </div>
                <?php Session::forget('error');?>
                    </div>
            @endif

                @if ($message = Session::get('error2'))
                    <div class="info-error">
                        <div class="ticket-info">
                            <p><b>Juz wziales udzial</b></p>
                        </div>
                        <?php Session::forget('error2');?>
                    </div>
                @endif
    </div>

    <div class="featured">
        @foreach($raffles as $raffle)
            @if($raffle->main == 1)
                <div class="main-raffle">
                    <a href="#{{$raffle->id}}"><img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" alt="{{$raffle->brand}} {{$raffle->title}}"></a>
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
                <div class="remodal" data-remodal-id="{{$raffle->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                    @guest
                        <div>
                            <div>
                                <h2>Login to take in</h2>
                            </div>
                            <br>
                            <a href="{{route('login')}}"><button class="remodal-login">Login with Facebook</button></a>
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
                                {!! Form::open(
                                    array(
                                       'route' => ['add_tickets', $raffle],
                                               'class' => 'form',
                                               'novalidate' => 'novalidate',
                                           ))
                                !!}
                                    <input type="number" name="tickets" class="form-number">

                            </div>
                        </div>
                        <br>
                        <button type="submit" class="remodal-confirm">Take in</button>
                            {!! Form::close() !!}
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
                    <a href="#{{$raffle->id}}"><img src="{{asset('images/'.$raffle->id.'/'.$raffle->thumb)}}" alt="{{$raffle->brand}} {{$raffle->title}}"></a>
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
                    <div class="remodal" data-remodal-id="{{$raffle->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                        @guest
                            <div>
                                <div>
                                    <h2>Login to take in</h2>
                                </div>
                                <br>
                                <a href="{{route('login')}}"><button class="remodal-login">Login with Facebook</button></a>
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
                                        {!! Form::open(
                                            array(
                                               'route' => ['add_tickets', $raffle],
                                                       'class' => 'form',
                                                       'novalidate' => 'novalidate',
                                                   ))
                                        !!}
                                        <input type="number" name="tickets" class="form-number">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="remodal-confirm">Take in</button>
                                {!! Form::close() !!}
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