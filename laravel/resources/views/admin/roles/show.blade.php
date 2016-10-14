@extends('layouts/admin')

@section('sectionLinks')
@include('admin/roles/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <small>
            <i class="fa fa-fw fa-calendar"></i> Créé le {{ $role->created_at }}
            @if($role->created_at != $role->updated_at)
            - <i class="fa fa-fw fa-refresh"></i> modifié le {{ $role->updated_at }}
            @endif
        </small>
        <dl>
            <dt>Nom interne</dt>
            <dd>{{ $role->name }}</dd>
            <dt>Nom public</dt>
            <dd>{{ $role->display_name }}</dd>
            <dt>Description</dt>
            <dd>{{ $role->description }}</dd>
        </dl>
        <div class="grid has-gutter">
            <div class="one-half">
                <h3>Users</h3>
                @if(count($role->users)>0)
                <table>
                    <thead>
                        <tr>
                            <th class="id-col">Id</th>
                            <th>Pseudo</th>
                            <th>Nom</th>
                            <th class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role->users as $r_user)
                        <tr>
                            <td>{{ $r_user->id }}</td>
                            <td>{{ $r_user->pseudo }}</td>
                            <td>{{ $r_user->first_name }} {{ $r_user->last_name }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.user.show', $r_user->id) }}" class="btn primary"><i class="fa fa-fw fa-eye"></i></a>
                                <a href="{{ route('admin.user.edit', $r_user->id) }}" class="btn primary"><i class="fa fa-fw fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="dashboard-empty">Aucun utilisateur n'est associé à ce rôle</div>
                @endif
            </div>
            <div class="one-half">
                <h3>Permissions</h3>
                @if(count($role->permissions)>0)
                <table>
                    <thead>
                        <tr>
                            <th class="id-col">Id</th>
                            <th>Route</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($role->permissions as $r_perm)
                        <tr>
                            <td>{{ $r_perm->id }}</td>
                            <td>{{ $r_perm->name }}</td>
                            <td>{{ $r_perm->display_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="dashboard-empty">Aucune permissions n'est associée à ce rôle</div>
                @endif
            </div>
        </div>
    </div>
    <aside class="w20 menu-second">
        <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
            <i class="fa fa-fw fa-trash"></i> Supprimer
            {!! Form::open(['route'=>['admin.role.destroy', 'id'=> $role->id], 'method'=>'DELETE']) !!}
            {!! Form::close() !!}
        </a>
    </aside>
</div>
@endsection