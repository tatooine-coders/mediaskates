@extends('layouts/simple')

@section('content')
    <h2>
        {{{ $event->name }}}</h2>
    <pre>
        {{{ $event->name }}}
        {{{ $event->address }}}
        {{{ $event->city }}}
        {{{ $event->zip }}}
        {{{ $event->date_event }}}
        {{{ $event->discipline_id }}}

        <!-- lien pour edit -->

        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary">Edit Event</a>

        <!-- form invisble pour delete -->

        {!! Form::model($event, [
        'method' => 'DELETE',
        'route' => ['admin.event.destroy', $event->id]
        ]) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}

    </pre>
@endsection
/**
 * Created by PhpStorm.
 * User: Jeremy-work
 * Date: 06/10/2016
 * Time: 10:47
 */