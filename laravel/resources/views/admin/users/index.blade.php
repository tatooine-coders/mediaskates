@extends('layouts/admin')

@section('sectionLinks')
@include('admin/events/section_links')
@endsection

@section('content')

<div class="page-wrapper">
    <div class="content">

        @if(count($users)>0)
        <table class="small">
            <thead>
                <tr>
                    <th class="id-col">Id</th>
                    <th>Pseudo</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Liens</th>
                    <th>Role</th>
                    <th>Date créa.</th>
                    <th>Date modif.</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><img class="avatar avatar-tiny" src="{{ asset(DEFAULT_PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/> {{ $user->pseudo }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->active }}</td>
                    <td>
                        @if(!empty($user->site_web))
                        <a href="{{ $user->site_web }}" target="_blank"><i class="fa fa-fw fa-2x fa-home"></i></a>
                        @else
                        <i class="fa fa-fw fa-2x fa-fw"></i>
                        @endif
                        @if(!empty($user->facebook))
                        <a href="{{ $user->facebook }}" target="_blank"><i class="fa fa-fw fa-2x fa-facebook-square"></i></a>
                        @else
                        <i class="fa fa-fw fa-2x fa-fw"></i>
                        @endif
                        @if(!empty($user->google))
                        <a href="{{ $user->google }}" target="_blank"><i class="fa fa-fw fa-2x fa-google-plus-square"></i></a>
                        @else
                        <i class="fa fa-fw fa-2x fa-fw"></i>
                        @endif
                        @if(!empty($user->twitter))
                        <a href="{{ $user->twitter }}" target="_blank"><i class="fa fa-fw fa-2x fa-twitter-square"></i></a>
                        @else
                        <i class="fa fa-fw fa-2x fa-fw"></i>
                        @endif
                    </td>
                    <td>
                        @foreach($user->roles as $u_role)
                        {{ link_to(route('admin.role.show', $u_role->id), $u_role->name) }},
                        @endforeach
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['admin.user.destroy', 'id'=> $user->id], 'method'=>'DELETE']) !!}
                            {!! Form::close() !!}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <div class="dashboard-empty">
            <div class="w50 center">
                Bizarrement, vous n'avez aucun utilisateur... Mis à part le fait que vous ne devriez pas être là, vous vouvez toujours <a href="{{ route('admin.user.create') }}">en créer un</a>.
            </div>
        </div>
        @endif

    </div>
</div>
@endsection