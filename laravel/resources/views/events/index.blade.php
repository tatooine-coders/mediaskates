@extends('layouts/simple')

@section('content')
    @if(count($events)>0)
        @foreach($events as $event)
            <tr>

                <td>Id : {{{ $event->id }}}</td><br/>
                <td>Nom : {{{ $event->name }}}</td><br/>
                <td>Adresse : {{{ $event->address }}}</td><br/>
                <td>Ville : {{{ $event->city }}}</td><br/>
                <td>CP : {{{ $event->zip }}}</td><br/>
                <td>Date : {{{ $event->date_event }}}</td><br/>
                <a href="{{ route('event.show', $event->id) }}" class="btn btn-info">View Event</a>

            </tr>
            <br/>
            <br/>
        @endforeach
    @else
        Pas d'evenements.
    @endif
@endsection