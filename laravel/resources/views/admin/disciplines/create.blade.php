@extends('layouts/admin')

@section('sectionLinks')
@include('admin/disciplines/section_links')
@endsection

@section('content')
{!! Form::open([
'method' => 'POST',
'route' => ['admin.discipline.store'],
'files' => true
]) !!}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['placeholder'=>'Roller', 'required'=>true]) !!}
            </div>
            <div class="one-half">
                {!! Form::label('logo', 'Logo') !!}
                {!! Form::file('logo') !!}
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