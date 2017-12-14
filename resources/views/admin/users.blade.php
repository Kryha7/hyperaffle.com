@extends('layouts.admin')
@section('content')
    <h1>Raffles</h1>
    <ul>
        @foreach($users as $user)
            <li>{{$user->id}} | {{$user->name}} | {{$user->email}} | {{$user->tickets}} tickets <a href="{{route('admin.user.edit', $user)}}">Edit</a> <a
                        href="">Delete</a></li>
        @endforeach
    </ul>
@endsection