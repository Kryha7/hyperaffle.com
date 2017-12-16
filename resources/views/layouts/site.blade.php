<ul>
    <li><a href="{{url('/')}}">Hyperaffle</a></li>
</ul>
<ul>
    @guest
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
    @else
        <li><a href="{{route('profile')}}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{route('tickets')}}">{{ Auth::user()->tickets }} tickets</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endguest
</ul>

@yield('content')