@extends('layouts/simple')
@section('content')
<section id="photog">
    <img class="pavatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/>
    <div id="mask">
        <ul>
            <h2>[{{ link_to(route('user.index'), '< Liste')}}] - {{{ $user->pseudo }}}</h2>
            <ul>
                <li>Prénom : {{{ $user->first_name }}}</li>
                <li>Nom : {{{ $user->last_name }}}</li>
                <!-- <li>{{{ $user->email }}}</li> -->
                <!-- <li>{{ $user->active }}</li> -->
                <!-- <li>{{ $user->preferences }}</li> -->
                <li>{{{ $user->site_web }}}</li>
                <li>{{{ $user->facebook }}}</li>
                <li>{{{ $user->google }}}</li>
                <li>{{{ $user->twitter }}}</li>

                <br>

            </ul>
            <p>{{{ $user->biography }}}</p>
        </ul>
        <div id="bandoRec"></div>
        <div id="bandoTri"></div>

    </div> 
    <div id='photoPhoto'>
        <img src="{{ asset('images/sources/roller.jpg') }}" alt>
    </div>     

</section>
@endsection