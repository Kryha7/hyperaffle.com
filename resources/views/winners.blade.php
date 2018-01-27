@extends('layouts.site')
@section('content')
    <h1>Winners archive</h1>
    <ol>
        @foreach($winners as $winner)
            <li><a href="{{route('winners.show', $winner)}}">{{$winner->brand}} {{$winner->title}}</a></li>
        @endforeach
    </ol>
@endsection