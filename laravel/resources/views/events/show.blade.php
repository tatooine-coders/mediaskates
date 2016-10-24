@extends('layouts/simple')

@section('content')
<div id="date-lieux">{{{ $event->city }}} - {{{ $event->date_event }}}</div>
      <!--{{{ $event->zip }}}
        {{{ $event->name }}}
        {{{ $event->address }}}
        {{{ $event->discipline_id }}}-->

@endsection
