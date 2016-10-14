@extends('layouts/admin')

@section('sectionLinks')
@include('admin/roles/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <small>
            <i class="fa fa-fw fa-calendar"></i> Créée le {{ $user->created_at }}
            @if($user->created_at != $user->updated_at)
            - <i class="fa fa-fw fa-refresh"></i> modifiée le {{ $user->updated_at }}
            @endif
        </small>
        <p><img src="{{ asset(DEFAULT_PROFILE_PICS_FOLDER . (!empty($user->profile_pic) ? $user->profile_pic : DEFAULT_PROFILE_PIC)) }}" class="avatar avatar-small" alt="avatar"/> {{ $user->pseudo }}</p>
        <dl>
            <dt>Roles</dt>
            <dd>
                @foreach($user->roles as $u_role)
                {{ link_to(route('admin.role.show', $u_role->id), $u_role->name) }},
                @endforeach
            </dd>
            <dt>Nom</dt>
            <dd>{{ $user->first_name }} {{ $user->last_name }}</dd>
            <dt>Email</dt>
            <dd>{{ $user->email }}</dd>
            <dt>Active</dt>
            <dd>{{ $user->active }}</dd>
            <dt>Liens</dt>
            <dd>
                @if(!empty($user->site_web))
                <a href="{{ $user->site_web }}" target="_blank"><i class="fa fa-fw fa-2x fa-home"></i></a>
                @endif
                @if(!empty($user->facebook))
                <a href="{{ $user->facebook }}" target="_blank"><i class="fa fa-fw fa-2x fa-facebook-square"></i></a>
                @endif
                @if(!empty($user->google))
                <a href="{{ $user->google }}" target="_blank"><i class="fa fa-fw fa-2x fa-google-plus-square"></i></a>
                @endif
                @if(!empty($user->twitter))
                <a href="{{ $user->twitter }}" target="_blank"><i class="fa fa-fw fa-2x fa-twitter-square"></i></a>
                @endif
            </dd>
        </dl>
        <h3>Biographie</h3>
        <p>{{ $user->biography }}</p>
    </div>
    <aside class="w20 menu-second">
        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
            <i class="fa fa-fw fa-trash"></i> Supprimer
            {!! Form::open(['route'=>['admin.user.destroy', 'id'=> $user->id], 'method'=>'DELETE']) !!}
            {!! Form::close() !!}
        </a>
    </aside>
</div>
        @endsection