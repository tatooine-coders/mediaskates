@extends('layouts/member')

@section('content')

	{{ Form::model($user, ['route'=>'user.personnal_infos.update', 'method'=>'PATCH']) }}
		<div class="flex-container page-wrapper">
			<div class="flex-item-fluid content">
				<div class="grid has-gutter">
					<div class="one-half">
						{!! Form::label('first_name', 'Prénom') !!}
						{!! Form::text('first_name', null, ['placeholder'=>'Jean', 'required'=>true]) !!}
					</div>
					<div class="one-half">
						{!! Form::label('last_name', 'Nom') !!}
						{!! Form::text('last_name', null, ['placeholder'=>'Dupond', 'required'=>true]) !!}
					</div>
				</div>
					{{-- {!! Form::label('role_id', 'Role') !!}
					{!! Form::select('role_id', $roles) !!}<br/> --}}

					{{-- {!! Form::label('profile_pic', 'Profile picture') !!}
					{!! Form::text('profile_pic') !!}<br/> --}}

				<div>
					{!! Form::label('email', 'Adresse email') !!}
					{!! Form::text('email', null, ['placeholder'=>'jdupond@site.com', 'required'=>true]) !!}

					{!! Form::label('site_web', 'Site web') !!}
					{!! Form::text('site_web', null, ['placeholder'=>'http://monsite.com']) !!}

					{!! Form::label('facebook', 'Facebook') !!}
					{!! Form::text('facebook', null, ['placeholder'=>'mon_id_facebook']) !!}

					{!! Form::label('google', 'Google plus') !!}
					{!! Form::text('google', null, ['placeholder'=>'mon_id_google']) !!}

					{!! Form::label('twitter', 'Twitter') !!}
					{!! Form::text('twitter', null, ['placeholder'=>'@mon_twitter']) !!}

					{!! Form::label('biography', 'A propos de vous') !!}
					{!! Form::textarea('biography', Auth::user()) !!}
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
					{!! Form::password('password_actual', ['required'=>true]) !!}
				</div>
				<div class="one-third">
					{!! Form::label('password', 'Nouveau mot de passe') !!}
					{!! Form::password('password', ['required'=>true]) !!}
				</div>
				<div class="one-third">
					{!! Form::label('password_confirmation', 'Confirmation') !!}
					{!! Form::password('password_confirmation', ['required'=>true]) !!}
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
	<div class="flex-container page-wrapper disabled">
		<div class="flex-item-fluid content">
			<div class="grid has-gutter">
				<div class="one-third">
					{!! Form::label('close_acct_passwd', 'Mot de passe actuel') !!}
					{!! Form::password('password', ['required'=>true, 'id'=>'close_acct_passwd', 'disabled'=>true]) !!}
				</div>
				<div class="two-thirds flex-container-v">
					<label for="delete_data_chkbx">{!! Form::input('checkbox', 'delete_data', null, ['id'=>'delete_data_chkbx', 'type'=>'checkbox', 'value'=>true, 'disabled'=>true]) !!} Supprimer mes données (photos/votes/...) </label>
					<small>
						<ul>
							<li>Supprimer vos données fermera votre compte, supprimera vos photos et changera votre nom (pour les commentaires).</li>
							<li>Si vous décidez de garder vos données, seul l'accès à votre compte sera bloqué.</li>
						</ul>
					</small>
				</div>
			</div>
		</div>
		<aside class="w20 menu-second">
				{!! Form::submit('Supprimer mon compte', ['class'=>'grave', 'disabled'=>true]) !!}
		</aside>
	</div>
	{{ Form::close() }}
@endsection
