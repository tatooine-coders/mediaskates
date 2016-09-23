@extends('layouts/simple')

@section('content')

{{ Form::model($user, ['url' => 'user/add', 'method'=>'post']) }}

    {{ Form::label('first_name', 'Prénom') }} - {{ Form::text('first_name', null, ['placeholder'=>'Jean']) }}<br/>
    {{ Form::label('last_name', 'Nom') }} - {{ Form::text('last_name', null, ['placeholder'=>'Dupond']) }}<br/>
    {{ Form::label('email', 'Adresse e-mail') }} - {{ Form::email('email', null, ['placeholder'=>'jean.dupond@exemple.com']) }}<br/>
    {{ Form::label('password', 'Mot de passe') }} - {{ Form::password('password') }}<br/>
    {{ Form::label('password2', 'Vérification') }} - {{ Form::password('password2') }}<br/>
    {{ Form::label('role_id', 'Role') }} - {{ Form::select('role_id', $roles) }}<br/>

    {{ Form::submit('Ajouter') }}

{{ Form::close() }}
@endsection