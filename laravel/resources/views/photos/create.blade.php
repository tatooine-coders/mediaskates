@extends('layouts/simple')

@section('content')

    @if(count($events)>0)

        <h1>Ajouter une photo</h1>

        {!! Form::open([
        'method' => 'POST',
        'route' => ['admin.photo.store']
        ]) !!}

        {!! Form::label('file', 'File') !!} - {!! Form::text('file', null, ['placeholder'=>'url photo']) !!}<br/>

        {!! Form::label('id_event', 'Event') !!} - {!! Form::select('event_id', $events) !!}<br/>
        {!! Form::label('id_watermark', 'Watermark') !!} - {!! Form::select('watermark_id', $watermarks) !!}<br/>
        {!! Form::label('id_license', 'License') !!} - {!! Form::select('license_id', $licenses) !!}<br/>

        {!! Form::submit('Ajouter une photo') !!}
        {!! Form::close() !!}

    @else
        Vous devez creer un event avant d ajouter des photos.
    @endif

@endsection



/**
 * Created by PhpStorm.
 * User: Jeremy-work
 * Date: 12/10/2016
 * Time: 07:45
 */