@extends('layouts.site')
@section('content')
    <div class="container-about">
        <div class="left-nav">
            <ul>
                <li><a href="{{route('about.us')}}">About us</a></li>
                <li class="active"><a href="{{route('about.jobs')}}">Jobs</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="{{route('about.privacy')}}">Privacy</a></li>
                <li><a href="{{route('about.terms')}}">Terms</a></li>
            </ul>
        </div>
        <div class="right-content">
            <h1>Jobs</h1>
            <img src="{{asset('images/jobs.png')}}" width="653px" height="435px">
        </div>
    </div>
@endsection