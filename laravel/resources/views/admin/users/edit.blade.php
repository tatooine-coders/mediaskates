@extends('layouts/simple')

@section('content')
  <!-- Form -->
  {!! Form::model($user, [
    'method' => 'PATCH', 
    'route' => ['user.update', $user->id]
    ]) !!}

  {!! Form::label('first_name', 'Prénom') !!} - {!! Form::text('first_name', null, ['placeholder'=>'Jean']) !!}<br/>
  {!! Form::label('last_name', 'Nom') !!} - {!! Form::text('last_name', null, ['placeholder'=>'Dupond']) !!}<br/>
  {!! Form::label('role_id', 'Role') !!} - {!! Form::select('role_id', $roles) !!}<br/>
  {!! Form::label('profile_pic', 'Profile picture') !!} - {!! Form::text('profile_pic') !!}<br/>
  {!! Form::label('site_web', 'Site') !!} - {!! Form::text('site_web', null, ['placeholder'=>'http://monsite.com']) !!}<br/>
  {!! Form::label('facebook', '') !!} - {!! Form::text('facebook', null, ['placeholder'=>'mon_id_facebook']) !!}<br/>
  {!! Form::label('google', '') !!} - {!! Form::text('google', null, ['placeholder'=>'mon_id_google']) !!}<br/>
  {!! Form::label('twitter', '') !!} - {!! Form::text('twitter', null, ['placeholder'=>'@mon_twitter']) !!}<br/>
  {!! Form::label('biography', '') !!} - {!! Form::textarea('biography', null, ['placeholder'=>'']) !!}<br/>
  
  {!! Form::submit('Mettre à jour') !!}
<!-- /Form-->
{!! Form::close() !!}
@endsection