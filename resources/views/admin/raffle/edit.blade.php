<ul>
    <li><a href="{{route('admin.raffles')}}">Raffles</a></li>
    <li><a href="{{route('admin.raffle.create')}}">Create raffle</a></li>
</ul>
<h1>{{$raffle->brand}} {{$raffle->title}}</h1>
<ul>
    <li>{{$raffle->tickets}}/{{$raffle->max_tickets}}</li>
</ul>
{!! Form::open(
    array(
        'route' => ['admin.raffle.update', $raffle],
        'class' => 'form',
        'novalidate' => 'novalidate',
    ))
!!}
{!! Form::label('Brand') !!}
{!! Form::text('brand', $raffle->brand) !!}

{!! Form::label('Title') !!}
{!! Form::text('title', $raffle->title) !!}

{!! Form::label('Max tickets') !!}
{!! Form::number('max_tickets', $raffle->max_tickets) !!}

{!! Form::submit('Edit raffle') !!}

{!! Form::close() !!}
