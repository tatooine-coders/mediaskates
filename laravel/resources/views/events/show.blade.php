@extends('layouts/simple')

@section('content')
<div id="date-lieux">{{{ $event->city }}} - {{{ $event->date_event }}}</div>
    <pre>
       
        
      
      <!--{{{ $event->zip }}} 
        {{{ $event->name }}}
        {{{ $event->address }}}
        {{{ $event->discipline_id }}}-->

        <!-- lien pour edit

        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary">Edit Event</a>

        <!-- form invisble pour delete

        {!! Form::model($event, [
        'method' => 'DELETE',
        'route' => ['admin.event.destroy', $event->id]
        ]) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!} -->

    </pre>
@endsection
<!--/**
 * Created by PhpStorm.
 * User: Corbite
 * Date: 06/10/2016
 * Time: 10:47
 */-->