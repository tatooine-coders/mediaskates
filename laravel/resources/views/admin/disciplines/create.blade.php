@extends('layouts/admin')

@section('content')
    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.discipline.store']
    ]) !!}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['placeholder'=>'Roller']) !!}
            
            {!! Form::label('logo', 'Logo') !!}
            {!! Form::text('logo', null, ['placeholder'=>'Image...']) !!}
        </div>
        <!-- Additionnal aside -->
	<aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
	</aside>
	<!-- /Additionnal aside -->
    </div>
    {!! Form::close() !!}
@endsection