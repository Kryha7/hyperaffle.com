<ul>
    <li><a href="{{route('admin.raffles')}}">Raffles</a></li>
    <li><a href="{{route('admin.raffle.create')}}">Create raffle</a></li>
</ul>
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

{!! Form::label('Brand') !!}
{!! Form::text('brand') !!}

{!! Form::label('Title') !!}
{!! Form::text('title') !!}

{!! Form::label('Max tickets') !!}
{!! Form::number('max_tickets') !!}

{!! Form::label('Raffle thumb') !!}
{!! Form::file('thumb', null) !!}

{!! Form::submit('Create raffle') !!}

{!! Form::close() !!}