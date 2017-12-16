@extends('layouts.admin')
@section('content')
    <h1>Users</h1>
    <ul>
        @foreach($users as $user)
            <li>{{$user->id}} | {{$user->name}} | {{$user->email}} | {{$user->tickets}} tickets | <a href="{{route('admin.user.edit', $user)}}">Edit</a> <a
                        href="{{route('admin.user.delete', $user)}}">Delete</a></li>
        @endforeach
    </ul>
@endsection