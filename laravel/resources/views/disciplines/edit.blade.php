@extends('layouts/simple')

@section('content')
    <!-- Form -->
    {!! Form::model($discipline, [
      'method' => 'PATCH',
      'route' => ['admin.discipline.update', $discipline->id]
      ]) !!}

    {!! Form::label('name', 'Nom') !!} - {!! Form::text('name', null, ['placeholder'=>'Nom']) !!}<br/>
    {!! Form::label('logo', 'Logo') !!} - {!! Form::text('logo', null, ['placeholder'=>'Logo']) !!}<br/>

    {!! Form::submit('Mettre à jour') !!}
    <!-- /Form-->
    {!! Form::close() !!}
@endsection

/**
 * Created by PhpStorm.
 * User: Jeremy-work
 * Date: 03/10/2016
 * Time: 11:41
 */