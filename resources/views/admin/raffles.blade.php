<ul>
    <li><a href="{{route('admin.raffles')}}">Raffles</a></li>
    <li><a href="{{route('admin.raffle.create')}}">Create raffle</a></li>
</ul>
<h1>Raffles</h1>
<ul>
    @foreach($raffles as $raffle)
        <li>{{$raffle->brand}} {{$raffle->title}} | {{$raffle->tickets}}/{{$raffle->max_tickets}} <a href="">Edit</a> <a href="{{route('admin.raffle.delete', $raffle)}}">Delete</a></li>
    @endforeach
</ul>