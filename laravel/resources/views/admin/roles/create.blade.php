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
            <div class="one-half">
                {!! Form::label('name', 'Nom') !!}
                {!! Form::text('name', null, ['placeholder'=>'super_admins', 'required'=>true]) !!}
            </div>
            <div class="one-half">
                {!! Form::label('users', 'Utilisateurs') !!}
                {!! Form::select('users[]', $users, null,['multiple'=>true, 'size'=>(count($users)>10)?10:count($users)]) !!}
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