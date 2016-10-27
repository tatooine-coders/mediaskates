@extends('layouts/simple')
<<<<<<< HEAD
=======
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
>>>>>>> origin/Vincent

@section('content')
<h2>
	[{{ link_to(route('user.index'), '< Liste')}}]
	- {{{ $user->pseudo }}}</h2>
<pre>
{{{ $user->first_name }}}
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
{{{ $user->biography }}}

</pre>
@endsection