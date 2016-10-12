@extends('layouts/simple')

@section('content')
    @if(count($photos)>0)
        @foreach($photos as $photo)
            <tr>

                <td>file : {{{ $photo->file }}}</td><br/>

                <a href="{{ route('admin.photo.show', $photo->id) }}" class="btn btn-info">View Photo</a>

            </tr>
            <br/>
            <br/>
        @endforeach
    @else
        Pas de photos.
    @endif
@endsection

/**
 * Created by PhpStorm.
 * User: Jeremy-work
 * Date: 12/10/2016
 * Time: 09:40
 */