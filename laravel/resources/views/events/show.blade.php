@extends('layouts/simple')

@section('content')
    <div>
        {{ $event->city }} - {{ $event->date_event }}
    </div>

    <div style="text-align: center">
    <h2>Photos de l'évènement</h2>
        @foreach($event->photos as $photo)
            <a href="{{ route('photo.show', $photo->id) }}"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/></a>
        @endforeach

    </div>


@endsection
