@extends('layouts/simple')

@section('content')
    @if(count($events)>0)
        <table class="centerTab">
            <thead>
                <tr style="color: red;">
                    <th>Discipline</th>
                    <th><a href="{{ route('event.index', ['order'=>'name', 'direction'=>($order==='name'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='name'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Nom</a></th>
                    <th><a href="{{ route('event.index', ['order'=>'date_event', 'direction'=>($order==='date_event'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='date_event'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Date</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <th>{{ $event->discipline->name }}</th>
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