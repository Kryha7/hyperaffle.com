@extends('layouts.site')
@section('content')
    <h1>{{ Auth::user()->name }}</h1>
    <h2>{{ Auth::user()->email }}</h2>
    <p>{{ Auth::user()->tickets }} tickets</p>
@endsection