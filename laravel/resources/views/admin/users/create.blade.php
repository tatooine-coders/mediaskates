@extends('layouts/admin')

@section('sectionLinks')
@include('admin/users/section_links')
@endsection


@section('content')
<!-- Form -->
{!! Form::open([
'method' => 'POST', 
'route' => ['admin.user.store']
]) !!}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-third">
                {!! Form::label('first_name', 'Prénom') !!}
                {!! Form::text('first_name', null, ['placeholder'=>'Jean', 'required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('last_name', 'Nom') !!}
                {!! Form::text('last_name', null, ['placeholder'=>'Dupond', 'required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('profile_pic', 'Profile picture') !!}
                {!! Form::text('profile_pic') !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-quarter">
                {!! Form::label('pseudo', 'Pseudo') !!}
                {!! Form::text('pseudo', null, ['required'=>true]) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['required'=>true]) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('password', 'Mot de passe') !!}
                {!! Form::password('password', null, ['required'=>true]) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('password_confirmation', 'Vérification') !!}
                {!! Form::password('password_confirmation', null, ['required'=>true]) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-quarter">
                {!! Form::label('site_web', 'Site perso') !!}
                {!! Form::text('site_web', null, ['placeholder'=>'http://monsite.com']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('facebook', 'Facebook') !!}
                {!! Form::text('facebook', null, ['placeholder'=>'mon_id_facebook']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('google', 'Google+') !!}
                {!! Form::text('google', null, ['placeholder'=>'mon_id_google']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('twitter', 'Twitter') !!}
                {!! Form::text('twitter', null, ['placeholder'=>'@mon_twitter']) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="two-thirds">
                {!! Form::label('biography', '') !!}
                {!! Form::textarea('biography', null, ['placeholder'=>'']) !!}
            </div>
            <div class="one-third">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('roles[]', $roles, [ROLE_MEMBER], ['multiple'=>true, 'required'=>true]) !!}
            </div>
        </div>
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::submit('Créer', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
<!-- /Form-->
{!! Form::close() !!}

@endsection