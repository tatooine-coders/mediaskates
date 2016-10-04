@extends('layouts/simple')

@section('content')
    <!-- Form -->
    {!! Form::model($watermark, [
      'method' => 'PATCH',
      'route' => ['admin.watermark.update', $watermark->id]
      ]) !!}

    {!! Form::label('name', 'Nom') !!} - {!! Form::text('name', null, ['placeholder'=>'Nom']) !!}<br/>
    {!! Form::label('logo', 'Type') !!} - {!! Form::select('type', array('1'=>'1', '2'=>'2', '3'=>'3')) !!}<br/>
    {!! Form::label('description', 'Description') !!} - {!! Form::text('description', null, ['placeholder'=>'description']) !!}<br/>

    {!! Form::submit('Mettre à jour') !!}
    <!-- /Form-->
    {!! Form::close() !!}
@endsection