@extends('layouts.site')
@section('content')
    <h1>{{$raffle->brand}} {{$raffle->title}}</h1>
    <p>Winner is {{$user->name}}</p>
@endsection