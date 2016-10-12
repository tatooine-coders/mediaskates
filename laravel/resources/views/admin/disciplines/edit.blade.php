@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/disciplines/section_links')
@endsection

@section('content')
    <!-- Form -->
    {!! Form::model($discipline, [
      'method' => 'PATCH',
      'route' => ['admin.discipline.update', $discipline->id]
      ]) !!}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            {!! Form::label('name', 'Nom') !!}
            {!! Form::text('name', null, ['placeholder'=>'Nom']) !!}

            {!! Form::label('logo', 'Logo') !!}
            {!! Form::text('logo', null, ['placeholder'=>'Logo']) !!}
        </div>
        <!-- Additionnal aside -->
        <aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
        </aside>
        <!-- /Additionnal aside -->
    </div>
    {!! Form::close() !!}
    <!-- /Form-->
@endsection

/**
 * Created by PhpStorm.
 * User: Jeremy-work
 * Date: 03/10/2016
 * Time: 11:41
 */