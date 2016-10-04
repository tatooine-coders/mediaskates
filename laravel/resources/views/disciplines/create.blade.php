@extends('layouts/simple')

@section('content')
    <h1>Ajouter une Discipline</h1>
    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.discipline.store']
    ]) !!}

    {!! Form::label('name', 'Nom') !!} - {!! Form::text('name', null, ['placeholder'=>'nom de la discipline']) !!}<br/>
    {!! Form::label('logo', 'Logo') !!} - {!! Form::text('logo', null, ['placeholder'=>'logo de la discipline']) !!}<br/>
    {!! Form::submit('Ajouter une discipline') !!}
    {!! Form::close() !!}
@endsection