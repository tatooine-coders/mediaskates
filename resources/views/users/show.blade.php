@extends('layouts/simple')

@section('content')
<section id="photog">
    <img class="pavatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/>
    <div id="mask">
        <ul>
            <a href="{{ route('user.index') }}"><h2><i class="fa fa-fw fa-chevron-left"></i>{{   $user->pseudo }}</h2></a>
            <ul>
                <li>Prénom : {{{ $user->first_name }}}</li>
                <li>Nom : {{{ $user->last_name }}}</li>
                <br>
                <li>
                    @if(!empty($user->site_web))
                    <a href="{{ $user->site_web }}"><i class="fa fa-fw fa-globe"></i></a>
                    @else
                    <i class="fa fa-fw fa-2x fa-fw"></i>
                    @endif
                    @if(!empty($user->facebook))
                    <a href="{{ $user->facebook }}"><i class="fa fa-fw fa-facebook"></i></a>
                    @else
                    <i class="fa fa-fw fa-2x fa-fw"></i>
                    @endif
                    @if(!empty($user->google))
                    <a href="{{ $user->google }}"><i class="fa fa-fw fa-google"></i></a>
                    @else
                    <i class="fa fa-fw fa-2x fa-fw"></i>
                    @endif
                    @if(!empty($user->twitter))
                    <a href="{{ $user->twitter }}"><i class="fa fa-fw fa-twitter"></i></a>
                    @else
                    <i class="fa fa-fw fa-2x fa-fw"></i>
                    @endif
                </li>
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
