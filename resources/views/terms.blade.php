@extends('layouts.site')
@section('content')
    <div class="container-about">
        <div class="left-nav">
            <ul>
                <li><a href="{{route('about.us')}}">About us</a></li>
                <li><a href="{{route('about.jobs')}}">Jobs</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="{{route('about.privacy')}}">Privacy</a></li>
                <li class="active"><a href="{{route('about.terms')}}">Terms</a></li>
            </ul>
        </div>
        <div class="right-content">
            <h1>Terms</h1>
            {{--<h2>Basic Terms</h2>--}}
            {{--<ol>--}}
                {{--<li>You must be 16 years or older to use this site.</li>--}}
                {{--<li>You must not abuse, harass, threaten, impersonate or intimidate other Hyperaffle users.</li>--}}
                {{--<li>You must not modify, adapt or hack Hyperaffle or modify another website so as to falsely imply that it is associated with Hyperaffle.</li>--}}
                {{--<li>You must not transmit any worms or viruses or any code of a destructive nature.</li>--}}
                {{--<li>Violation of any of these agreements will result in the termination of your Hyperaffle account.</li>--}}
            {{--</ol>--}}

            {{--<h2>General Conditions</h2>--}}
            {{--<ol>--}}
                {{--<li>We reserve the right to modify or terminate the Instagram service for any reason, without notice at any time.</li>--}}
            {{--</ol>--}}
        </div>
    </div>
@endsection