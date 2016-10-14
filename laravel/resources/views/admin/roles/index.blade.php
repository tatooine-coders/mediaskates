@extends('layouts/admin')

@section('sectionLinks')
@include('admin/roles/section_links')
@endsection

@section('content')

<div class="page-wrapper">
    <div class="content">

        @if(count($roles)>0)
        <table class="small">
            <thead>
                <tr>
                    <th class="id-col">Id</th>
                    <th>Nom</th>
                    <th>Date créa.</th>
                    <th>Date modif.</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.role.show', $role->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('admin.role.edit', $role->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['admin.role.destroy', 'id'=> $role->id], 'method'=>'DELETE']) !!}
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
                Bizarrement, vous n'avez aucun utilisateur... Mis à part le fait que vous ne devriez pas être là, vous vouvez toujours <a href="{{ route('admin.role.create') }}">en créer un</a>.
            </div>
        </div>
        @endif

    </div>
</div>
@endsection