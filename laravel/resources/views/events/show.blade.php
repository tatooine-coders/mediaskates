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


    </pre>
@endsection
