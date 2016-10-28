@extends('layouts/simple')

@section('content')
        <img src="{{ asset(DISCIPLINES_PIC_FOLDER.$discipline->logo) }}" alt="{{ $discipline->name}}" />

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