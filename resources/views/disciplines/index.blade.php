@extends('layouts/simple')

@section('header')
<section id="slide">
    <div id='mask'>
        <h1>Mediaskates, votre portail photo 100% roller !</h1>
        <div id="bandoRec"></div>
        <div id="bandoTri"></div>
    </div>
    <div id='diapo'>
        <div class='slide1'></div>
        <div class='slide2'></div>
        <div class='slide3'></div>
        <div class='slide4'></div>
        <div class='slide5'></div>
    </div>
</section>
<div class="bordure"></div>
@endsection
@section('content')
@if(count($disciplines)>0)
<section id="banierePhotos">
    <div id="photos">
        @foreach($disciplines as $discipline)

        <a href="{{ route('discipline.show', $discipline->id) }}" class="btn btn-info">
            <img src="{{ asset(DISCIPLINES_THUMB_FOLDER.$discipline->logo) }}" alt="{{ $discipline->name }}" />
            {{ $discipline->name }}
        </a>

        @endforeach
    </div>
</section>
@else
Pas de disciplines.
@endif
@endsection