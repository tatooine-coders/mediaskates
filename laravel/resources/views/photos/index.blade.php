@extends('layouts/simple')

@section('content')
    @if(count($photos)>0)
        @foreach($photos as $photo)
            <div>
                <a href="{{ route('photo.show', $photo->id) }}"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/></a>
            </div>
        @endforeach
    @else
        Pasde photos.
    @endif
@endsection