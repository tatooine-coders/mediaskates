@extends('layouts/simple')
@section('content')
<section id="photog">
    <ul>
        <li><h2>[{{ link_to(route('user.index'), '< Liste')}}]- {{{ $user->pseudo }}}</h2></li>
        <img class="pavatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/><div id='mask'>
            <li>{{{ $user->first_name }}}
        {{{ $user->last_name }}}
        {{{ $user->pseudo }}}
        {{{ $user->email }}}
        {{ $user->profile_pic }}
        {{ $user->active }}
        {{ $user->preferences }}
        {{{ $user->site_web }}}
        {{{ $user->facebook }}}
        {{{ $user->google }}}
        {{{ $user->twitter }}}
        {{{ $user->biography }}}</li>
    </ul>    
        <div id="bandoRec"></div>
        <div id="bandoTri"></div>
      
    </div>
    <div id='diapo'>
        <img src="{{ asset('images/sources/roller.jpg') }}" alt>
    </div>     
   
</section>
@endsection