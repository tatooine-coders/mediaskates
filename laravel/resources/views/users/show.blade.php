@extends('layouts/simple')
@section('content')
<section id="photog">
    <img class="pavatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/>
    <div id="mask">
        <ul>
            <h2>[{{ link_to(route('user.index'), '< Liste')}}] - {{ $user->pseudo }}</h2>
            <ul>
                <li>Prénom : {{{ $user->first_name }}}</li>
                <li>Nom : {{{ $user->last_name }}}</li>
                <br>
                <!-- <li>{{{ $user->email }}}</li> -->
                <!-- <li>{{ $user->active }}</li> -->
                <!-- <li>{{ $user->preferences }}</li> -->
                <li><a href="{{ $user->site_web }}"><i class="fa fa-fw fa-globe"></i></a>
                <a href="{{ $user->facebook }}"><i class="fa fa-fw fa-facebook"></i></a>
                <a href="{{ $user->google }}"><i class="fa fa-fw fa-google"></i></a>
                <a href="{{ $user->twitter }}"><i class="fa fa-fw fa-twitter"></i></a></li>
                <br>
            </ul>
            <p>{!!nl2br($user->biography)!!}</p>
        </ul>
        <div id="bandoRec"></div>
        <div id="bandoTri"></div>

    </div> 
    <div id='photoPhoto'>
        <img src="{{ asset('images/sources/roller.jpg') }}" alt>
    </div>     

</section>
@endsection