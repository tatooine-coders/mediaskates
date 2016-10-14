@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/watermarks/section_links')
@endsection

@section('content')
    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.watermark.store']
    ]) !!}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['placeholder'=>'Name']) !!}

            {!! Form::label('type', 'Type') !!}
            {!! Form::text('type', null, ['placeholder'=>'Type']) !!}

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', null, ['placeholder'=>'Description']) !!}
        </div>
        <!-- Additionnal aside -->
        <aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
        </aside>
        <!-- /Additionnal aside -->
    </div>
    {!! Form::close() !!}
@endsection