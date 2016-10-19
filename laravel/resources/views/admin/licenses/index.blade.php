@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/licenses/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        @if(count($licenses)> 0 )
        <table>
            <thead>
                <tr>
                    <th class="id-col">Id</th>
                    <th>Nb photos</th>
                    <th><a href="{{ route('admin.license.index', ['order'=>'name', 'direction'=>($order==='name'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='name'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Nom</a></th>
                    <th><a href="{{ route('admin.license.index', ['order'=>'url', 'direction'=>($order==='url'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='url'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> URL</a></th>
                    <th><a href="{{ route('admin.license.index', ['order'=>'created_at', 'direction'=>($order==='created_at'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='created_at'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Date Créa.</a></th>
                    <th><a href="{{ route('admin.license.index', ['order'=>'updated_at', 'direction'=>($order==='updated_at'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='updated_at'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Date Modif.</a></th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($licenses as $license)
                <tr>
                    <td>{{ $license->id }}</td>
                    <td>{{ count($license->photos) }}</td>
                    <td>{{ $license->name }}</td>
                    <td>{{ link_to($license->url, $license->url, ['target'=>'_blank']) }}</td>
                    <td>{{ $license->created_at }}</td>
                    <td>{{ $license->updated_at }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.license.show', $license->id) }}" class="btn btn-info primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('admin.license.edit', $license->id) }}" class="btn btn-info primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['admin.license.destroy', 'id'=> $license->id], 'method'=>'DELETE']) !!}
                            {!! Form::close() !!}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="dashboard-empty w50 center">
            <div>
                Pas de licenses. <a href="{{ route('admin.license.create') }}"><i class="fa fa-plus"></i> En ajouter une</a>.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
