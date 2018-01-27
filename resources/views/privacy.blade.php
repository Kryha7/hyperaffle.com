@extends('layouts.site')
@section('content')
    <div class="container-about">
        <div class="left-nav">
            <ul>
                <li><a href="{{route('about.us')}}">About us</a></li>
                <li><a href="{{route('about.jobs')}}">Jobs</a></li>
                <li><a href="#">Support</a></li>
                <li class="active"><a href="{{route('about.privacy')}}">Privacy</a></li>
                <li><a href="{{route('about.terms')}}">Terms</a></li>
            </ul>
        </div>
        <div class="right-content">
            <h1>Privacy</h1>
        </div>
    </div>
@endsection