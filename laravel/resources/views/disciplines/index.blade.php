@extends('layouts/simple')

@section('content')
	@if(count($disciplines)>0)
		@foreach($disciplines as $discipline)
			<tr>

				<td>Id : {{{ $discipline->id }}}</td><br/>
				<td>Nom : {{{ $discipline->name }}}</td><br/>
				<td>Logo : {{{ $discipline->logo }}}</td><br/>
				<a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info">View Discipline</a>

			</tr>
			<br/>
			<br/>
		@endforeach
	@else
		Pas de disciplines.
	@endif
@endsection