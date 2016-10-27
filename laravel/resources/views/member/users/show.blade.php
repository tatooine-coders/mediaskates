@extends('layouts/member')

@section('content')
	<div class="page-wrapper dashboard-empty">
		@if((!isset($comments))&&(!isset($tags)))
			<div class="center w50">
				Bienvenue dans votre espace personnel. A partir d'ici vous pourrez gérer votre compte et interagir avec le contenu disponible.
			</div>
		@endif
		{{--si clique lien commentaires dashboard--}}
		@if(isset($comments))
			<div class="dashboardInfos">
				<h2>Mes commentaires</h2>
				@if(count($comments)>0)
					@foreach($comments as $comment)
						<a href="{{route('photo.show', $comment->photo_id)}}"> {{ $comment->id }} - {{ $comment->text }} </a></br>
					@endforeach
				@else
					Pas de commentaires.
				@endif
			</div>
		@endif
		{{--si clique lien tags dashboard--}}
		@if(isset($tags))
			<div class="dashboardInfos">
				<h2>Tags</h2>
				@if(count($tags)>0)
					@foreach($tags as $tag)
						<a href="{{route('photo.show', $tag->photo_id)}}">
						<img class="small" src="{{ asset(UPLOADS_THUMB_FOLDER.$tag->photo->file) }}" alt="{{ $tag->photo->file }}" /></a>
					@endforeach
				@else
					Mon nom n'apparait sur aucune photo.
				@endif
			</div>
		@endif
	</div>

@endsection
