@extends('layouts/simple')

@section('content')
    <h2>{{ $discipline->name }}</h2>
    <pre>
        {{ $discipline->name }}
        <img src="{{ asset(DISCIPLINES_THUMB_FOLDER.$discipline->logo) }}" alt="{{ $discipline->name}}" />
    </pre>

<hr>
<h2>Evenements pour cette discipline</h2>

@if(count($discipline->events)>0)
    @foreach($discipline->events as $event)
        <div>
            <a href="{{ route('event.show', $event->id) }}">{{ $event->name }}</a>
        </div>
    @endforeach
@else
    Pas d'évènements
@endif

@endsection