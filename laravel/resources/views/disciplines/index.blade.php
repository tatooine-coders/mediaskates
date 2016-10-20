@extends('layouts/simple')

@section('header')
    <section id="slide">
        <div id='mask'>
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
@endsection

@section('content')
    @if(count($disciplines)>0)
        @foreach($disciplines as $discipline)
            <div>
            Id : {{ $discipline->id }}
            Nom : {{ $discipline->name }}
            Logo : <img src="{{ asset(DISCIPLINES_THUMB_FOLDER.$discipline->logo) }}" alt="{{ $discipline->name }}" />
            <a href="{{ route('discipline.show', $discipline->id) }}" class="btn btn-info">View Discipline</a>
            </div>
        @endforeach
    @else
        Pas de disciplines.
    @endif
@endsection