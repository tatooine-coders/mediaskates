@extends('layouts/simple')

@section('content')
    @if(count($watermarks)>0)
        @foreach($watermarks as $watermark)
            <tr>

                <td>Id : {{{ $watermark->id }}}</td><br/>
                <td>Nom : {{{ $watermark->name }}}</td><br/>
                <td>Type : {{{ $watermark->type }}}</td><br/>
                <td>Description : {{{ $watermark->description }}}</td><br/>
                <a href="{{ route('admin.watermark.show', $watermark->id) }}" class="btn btn-info">View Watermark</a>
            </tr>
            <br/>
            <br/>
        @endforeach
    @else
        Pas de watermarks.
    @endif
@endsection