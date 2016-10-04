@extends('layouts/simple')

@section('content')
    <h2>
        {{{ $watermark->name }}}</h2>
    <pre>
        {{{ $watermark->name }}}
        {{{ $watermark->type }}}
        {{{ $watermark->description }}}


        <!-- lien pour edit -->

        <a href="{{ route('admin.watermark.edit', $watermark->id) }}" class="btn btn-primary">Edit Watermark</a>

        <!-- form invisble pour delete -->

        {!! Form::model($watermark, [
        'method' => 'DELETE',
        'route' => ['admin.watermark.destroy', $watermark->id]
        ]) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}

    </pre>
@endsection