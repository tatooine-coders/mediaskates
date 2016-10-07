@extends('layouts/admin')

@section('content')
<h2>
    {{{ $discipline->name }}}</h2>
<pre>
        {{{ $discipline->name }}}
        {{{ $discipline->logo }}}

        <!-- lien pour edit -->

        <a href="{{ route('admin.discipline.edit', $discipline->id) }}" class="btn btn-primary">Edit Discipline</a>

        <!-- form invisble pour delete -->

        {!! Form::model($discipline, [
        'method' => 'DELETE',
        'route' => ['admin.discipline.destroy', $discipline->id]
        ]) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}

</pre>
@endsection