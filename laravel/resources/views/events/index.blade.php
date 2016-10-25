@extends('layouts/simple')

@section('content')
    @if(count($events)>0)
        <table class="centerTab">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><a href="{{ route('event.show', $event->id) }}">{{ $event->name }}</a></td>
                        <td>{{ $event->date_event }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Pas d'evenements.
    @endif
@endsection