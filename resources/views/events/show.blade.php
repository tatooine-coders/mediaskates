@extends('layouts/simple')

@section('content')
    <div id="infoevent">
        Lieu : {{ $event->address }} - {{ $event->zip }} - {{ $event->city }}</br>
        Date : {{ $event->date_event }}</br>

    </div>
    <h1>Photos de l'évènement :</h1>
    <div id="photoevent">
        @foreach($photos as $photo)
            <a href="{{ route('photo.show', $photo->id) }}"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/></a>
        @endforeach
            {{--Pagination--}}
            <div style="text-align: center">
                {{ $photos->links() }}
            </div>
    </div>


@endsection
