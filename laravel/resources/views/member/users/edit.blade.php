@extends('layouts/member')

@section('content')

	{{ Form::model($user, ['route'=>'user.personnal_infos.update', 'method'=>'PATCH']) }}
		<div class="flex-container page-wrapper">
			<div class="flex-item-fluid content">
				<div class="grid has-gutter">
					<div class="one-half">
						{!! Form::label('first_name', 'Prénom') !!}
						{!! Form::text('first_name', null, ['placeholder'=>'Jean']) !!}<br/>
					</div>
					<div class="one-half">
						{!! Form::label('last_name', 'Nom') !!}
						{!! Form::text('last_name', null, ['placeholder'=>'Dupond']) !!}<br/>
					</div>
				</div>
					{{-- {!! Form::label('role_id', 'Role') !!}
					{!! Form::select('role_id', $roles) !!}<br/> --}}

					{{-- {!! Form::label('profile_pic', 'Profile picture') !!}
					{!! Form::text('profile_pic') !!}<br/> --}}

				<div>
					{!! Form::label('site_web', 'Site web') !!}
					{!! Form::text('site_web', null, ['placeholder'=>'http://monsite.com']) !!}<br/>

					{!! Form::label('facebook', 'Facebook') !!}
					{!! Form::text('facebook', null, ['placeholder'=>'mon_id_facebook']) !!}<br/>

					{!! Form::label('google', 'Google plus') !!}
					{!! Form::text('google', null, ['placeholder'=>'mon_id_google']) !!}<br/>

					{!! Form::label('twitter', 'Twitter') !!}
					{!! Form::text('twitter', null, ['placeholder'=>'@mon_twitter']) !!}<br/>

					{!! Form::label('biography', 'A propos de vous') !!}
					{!! Form::textarea('biography', null, ['placeholder'=>'']) !!}<br/>
				</div>
			</div>
			<!-- Additionnal aside -->
			<aside class="w20 menu-second">
					{!! Form::submit('Enregistrer', ['class'=>'primary']) !!}

					@if(!Entrust::hasRole('photograph'))
					<a href="#" class="btn danger block">Demander à être photographe</a>
					@endif

			</aside>
			<!-- /Additionnal aside -->
		</div>
	{{ Form::close() }}

	<h2>Changer de mot de passe</h2>
	{{ Form::open(['route'=>'user.update_passwd', 'method'=>'PATCH']) }}
	<div class="flex-container page-wrapper">
		<div class="flex-item-fluid content">
			<div class="grid has-gutter">
				<div class="one-third">
					{!! Form::label('password_actual', 'Mot de passe actuel') !!}
					{!! Form::password('password_actual') !!}
				</div>
				<div class="one-third">
					{!! Form::label('password', 'Nouveau mot de passe') !!}
					{!! Form::password('password') !!}
				</div>
				<div class="one-third">
					{!! Form::label('password_confirm', 'Confirmation') !!}
					{!! Form::password('password_confirm') !!}
				</div>
			</div>
		</div>
		<aside class="w20 menu-second">
				{!! Form::submit('Changer de mot de passe', ['class'=>'primary']) !!}
		</aside>
	</div>
	{{ Form::close() }}

	<h2>Supprimer le compte</h2>
	{{ Form::open(['route'=>'user.update_passwd', 'method'=>'DELETE']) }}
	<div class="flex-container page-wrapper">
		<div class="flex-item-fluid content">
			{!! Form::label('password', 'Mot de passe actuel') !!}
			{!! Form::password('password') !!}
		</div>
		<aside class="w20 menu-second">
				{!! Form::submit('Supprimer mon compte', ['class'=>'grave']) !!}
		</aside>
	</div>
	{{ Form::close() }}
@endsection
