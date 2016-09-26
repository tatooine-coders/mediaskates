@extends('layouts/simple')

@section('content')
  @if(count($disciplines)>0)
	@foreach($disciplines as $discipline)
		{{ var_dump('disciplines') }}
	@endforeach
  @else
	Pas de disciplines.
  @endif
@endsection