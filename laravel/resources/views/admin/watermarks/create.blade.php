@extends('layouts/admin')

@section('sectionLinks')
@include('admin/watermarks/section_links')
@endsection

@section('content')
{!! Form::open([
'method' => 'POST',
'route' => ['admin.watermark.store'],
'files' => true,
]) !!}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['placeholder'=>'Name', 'required'=>true]) !!}
            </div>
            <div class="one-half">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['placeholder'=>'Description', 'required'=>true]) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-third">
                {!! Form::label('position', 'Position') !!}
                {!! Form::select('position', [
                'center'=>'Centré',
                'top-right'=>'En haut à droite',
                'center-top'=>'En haut, centré',
                'top-left'=>'En haut à gauche',
                'bottom-right'=>'En bas à droite',
                'center-bottom'=>'En bas, centré',
                'bottom-left'=>'En bas à gauche',
                ], 'center', ['required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('position', 'Marges') !!}
                {!! Form::number('margin', 5, ['placeholder'=>'5', 'required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('file', 'Fichier') !!}
                {!! Form::file('file', ['required'=>true]) !!}
            </div>
        </div>
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
{!! Form::close() !!}
@endsection