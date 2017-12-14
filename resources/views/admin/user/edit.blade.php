@extends('layouts.admin')
@section('content')
    <h1>{{$user->name}} | {{$user->email}}</h1>
    <ul>
        <li>{{$user->tickets}} tickets</li>
    </ul>
    {!! Form::open(
        array(
            'route' => ['admin.user.update', $user],
            'class' => 'form',
            'novalidate' => 'novalidate',
        ))
    !!}
    {!! Form::label('Name') !!}
    {!! Form::text('name', $user->name) !!}

    {!! Form::label('Email') !!}
    {!! Form::text('email', $user->email) !!}

    {!! Form::label('Tickets') !!}
    {!! Form::number('tickets', $user->tickets) !!}

    {!! Form::submit('Edit user') !!}

    {!! Form::close() !!}
@endsection
