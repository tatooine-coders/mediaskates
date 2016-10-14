@extends('layouts/admin')

@section('sectionLinks')
@include('admin/roles/section_links')
@endsection


@section('content')
<!-- Form -->
{!! Form::model($role, [
'method' => 'PATCH',
'route' => ['admin.role.update', $role->id]
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
                <select name="users[]" multiple="multiple" size='20'>
                    @foreach($users as $k=>$user)
                    <option value="{{ $k }}" {{ in_array($k, $role_users) ? 'selected=selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
            </div>
            <div class="one-half">
                {!! Form::label('permissions', 'Permissions') !!}
                <select name="permissions[]" multiple="multiple" size='20'>
                    @foreach($permissions as $k=>$permission)
                    <option value="{{ $k }}" {{ in_array($k, $role_permissions) ? 'selected=selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::submit('Mettre à jour', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
<!-- /Form-->
{!! Form::close() !!}

@endsection