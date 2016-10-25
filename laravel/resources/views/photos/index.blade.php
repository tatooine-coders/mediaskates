@extends('layouts/simple')

@section('content')
@if(count($photos)>0)
    <div style="text-align: center">
        @foreach($photos as $photo)
            <div style="width: 20%; text-align: center">
                <a href="{{ route('photo.show', $photo->id) }}"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}"/></a>
            </div>
        @endforeach
    </div>
@else
    Pasde photos.
@endif

{{--Pagination--}}
<div style="text-align: center">
    {{ $photos->links() }}
</div>



@endsection