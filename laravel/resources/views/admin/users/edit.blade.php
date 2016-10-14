@extends('layouts/admin')

@section('sectionLinks')
@include('admin/users/section_links')
@endsection


@section('content')
<!-- Form -->
{!! Form::model($user, [
'method' => 'PATCH', 
'route' => ['admin.user.update', $user->id]
]) !!}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-third">
                {!! Form::label('first_name', 'Prénom') !!}
                {!! Form::text('first_name', null, ['placeholder'=>'Jean']) !!}
            </div>
            <div class="one-third">
                {!! Form::label('last_name', 'Nom') !!}
                {!! Form::text('last_name', null, ['placeholder'=>'Dupond']) !!}
            </div>
            <div class="one-third">
                {!! Form::label('profile_pic', 'Profile picture') !!}
                {!! Form::text('profile_pic') !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-quarter">
                {!! Form::label('site_web', 'Site perso') !!}
                {!! Form::text('site_web', null, ['placeholder'=>'http://monsite.com']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('facebook', 'Facebook') !!}
                {!! Form::text('facebook', null, ['placeholder'=>'mon_id_facebook']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('google', 'Google+') !!}
                {!! Form::text('google', null, ['placeholder'=>'mon_id_google']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('twitter', 'Twitter') !!}
                {!! Form::text('twitter', null, ['placeholder'=>'@mon_twitter']) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="two-thirds">
                {!! Form::label('biography', '') !!}
                {!! Form::textarea('biography', null, ['placeholder'=>'']) !!}
            </div>
            <div class="one-third">
                {!! Form::label('role_id', 'Role') !!}
                <select name="roles[]" multiple="multiple">
                    @foreach($roles as $k=>$role)
                    <option value="{{ $k }}" {{ in_array($k, $user_roles) ? 'selected=selected' : '' }}>{{ $role }}</option>
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