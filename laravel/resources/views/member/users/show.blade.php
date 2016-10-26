@extends('layouts/member')

@section('content')
	<div class="page-wrapper dashboard-empty">
		<div class="center w50">
			Bienvenue dans votre espace personnel. A partir d'ici vous pourrez gérer votre compte et interagir avec le contenu disponible.
		</div>
		{{--si clique lien commentaires dashboard--}}
		<div class="dashboardInfos">
			@if(isset($comments))
				<h2>Mes commentaires</h2>
				@if(count($comments)>0)
					@foreach($comments as $comment)
						{{ $comment->id }} - {{ $comment->text }} </br>
					@endforeach
				@else
					Pas de commentaires.
				@endif
			@endif
		</div>
	</div>

@endsection
