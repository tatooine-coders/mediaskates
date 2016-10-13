@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/licenses/section_links')
@endsection

@section('content')
    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.license.store']
    ]) !!}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['placeholder'=>'Creative Commons BY-NC-SA']) !!}
            
            {!! Form::label('url', 'Url') !!}
            {!! Form::text('url', null, ['placeholder'=>'http://tldr.com/cc-by-nc-sa']) !!}
        </div>
        <!-- Additionnal aside -->
	<aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
	</aside>
	<!-- /Additionnal aside -->
    </div>
    {!! Form::close() !!}
@endsection