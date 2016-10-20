@extends('layouts/simple')

@section('content')
    @if(count($photos)>0)
        @foreach($photos as $photo)
            <div>
                <img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/>
            </div>
        @endforeach
    @else
        Pasde photos.
    @endif
@endsection