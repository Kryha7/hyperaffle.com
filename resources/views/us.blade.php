@extends('layouts.site')
@section('content')
    <div class="container-about">
        <div class="left-nav">
            <ul>
                <li class="active"><a href="{{route('about.us')}}">About us</a></li>
                <li><a href="{{route('about.jobs')}}">Jobs</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="{{route('about.privacy')}}">Privacy</a></li>
                <li><a href="{{route('about.terms')}}">Terms</a></li>
            </ul>
        </div>
        <div class="right-content">
            <h1>About us</h1>
            <h2>The team</h2>
            <h3>Kryszto (CEO, founder)</h3>
            <p>
                Internet knows he as <strong>Kryszto</strong>(<a href="https://www.instagram.com/krysztox/" target="_blank">@krysztox</a>). In streetwear community is since 2014.<br>
                His next project <strong>hyperaffle.online</strong> is the first website around the world with raffling to take place worldwide. Shipped for all countries for free. Try your luck and take in our raffles.
            </p>
        </div>
    </div>
@endsection