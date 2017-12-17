<ul>
    <li><a href="{{route('admin.users')}}">Users</a></li>
</ul>
<ul>
    <li><a href="{{route('admin.tickets_transactions')}}">Tickets transactions</a></li>
</ul>
<ul>
    <li><a href="">Payment transactions</a></li>
</ul>
<ul>
    <li><a href="{{route('admin.raffles')}}">Raffles</a></li>
    <li><a href="{{route('admin.raffle.winners')}}">Show winners</a></li>
    <li><a href="{{route('admin.raffle.create')}}">Create raffle</a></li>
</ul>

@yield('content')