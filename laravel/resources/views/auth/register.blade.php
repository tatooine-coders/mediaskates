@extends('layouts/simple')

@section('content')
  {!! Form::open(['url'=>'/register', 'method'=>'POST']) !!}
	{!! Form::label('first_name', 'Prénom') !!} - {!! Form::text('first_name', null, ['placeholder'=>'Jean']) !!}<br/>
	{!! Form::label('last_name', 'Nom') !!} - {!! Form::text('last_name', null, ['placeholder'=>'Dupond']) !!}<br/>
	{!! Form::label('pseudo', 'Pseudo') !!} - {!! Form::text('pseudo', null, ['placeholder'=>'Rambo_warrior']) !!}<br/>
	{!! Form::label('email', 'Adresse e-mail') !!} - {!! Form::email('email', null, ['placeholder'=>'jean.dupond@exemple.com']) !!}<br/>
	{!! Form::label('password', 'Mot de passe') !!} - {!! Form::password('password') !!}<br/>
	{!! Form::label('password_confirmation', 'Vérification') !!} - {!! Form::password('password_confirmation') !!}<br/>

	{!! Form::submit('Créer un compte') !!}
  {!! Form::close() !!}
@endsection
