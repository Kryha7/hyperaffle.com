@extends('layouts.admin')
@section('content')
<br/>
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
<br/>

<h1>Create raffle</h1>
{!! Form::open(
    array(
        'route' => 'admin.raffle.store',
        'class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true
    ))
!!}

{!! Form::label('Main') !!}
{!! Form::checkbox('main', 1) !!}

{!! Form::label('Brand') !!}
{!! Form::text('brand') !!}

{!! Form::label('Title') !!}
{!! Form::text('title') !!}

{!! Form::label('Max tickets') !!}
{!! Form::number('max_tickets') !!}

{!! Form::label('Raffle thumb') !!}
{!! Form::file('thumb', null) !!}

{!! Form::label('Raffle preview images') !!}
{!! Form::file('images[]', ['multiple' => 'multiple']); !!}

{!! Form::submit('Create raffle') !!}

{!! Form::close() !!}
@endsection