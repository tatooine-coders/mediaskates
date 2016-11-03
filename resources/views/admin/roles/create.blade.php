@extends('layouts/admin')

@section('sectionLinks')
@include('admin/roles/section_links')
@endsection


@section('content')
<!-- Form -->
{!! Form::open([
'method' => 'POST',
'route' => ['admin.role.store']
]) !!}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-third">
                {!! Form::label('name', 'Nom interne') !!}
                {!! Form::text('name', null, ['placeholder'=>'super_admin', 'required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('display_name', 'Nom public') !!}
                {!! Form::text('display_name', null, ['placeholder'=>'Super admin', 'required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['placeholder'=>'Tous les droits',]) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('users', 'Utilisateurs') !!}
                {!! Form::select('users[]', $users, null,['multiple'=>true, 'size'=>(count($users)>20)?20:count($users)]) !!}
            </div>
            <div class="one-half">
                {!! Form::label('permissions', 'Permissions') !!}
                {!! Form::select('permissions[]', $permissions, null,['multiple'=>true, 'size'=>20]) !!}
            </div>
        </div>
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::submit('Créer', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
<!-- /Form-->
{!! Form::close() !!}

@endsection