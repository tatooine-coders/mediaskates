@extends('layouts/simple')

@section('content')
    <h1>Ajouter un Watermark</h1>
    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.watermark.store']
    ]) !!}

    {!! Form::label('name', 'Nom') !!} - {!! Form::text('name', null, ['placeholder'=>'nom']) !!}<br/>
    {!! Form::label('type', 'Type') !!} - {!! Form::select('type', array('1'=>'1', '2'=>'2', '3'=>'3') ) !!}<br/>
    {!! Form::label('description', 'Description') !!} - {!! Form::text('description', null, ['placeholder'=>'description']) !!}<br/>
    {!! Form::submit('Ajouter un watermark') !!}
    {!! Form::close() !!}
@endsection