@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/disciplines/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        @if(count($disciplines)> 0 )
        <table>
            <thead>
                <tr>
                    <th class="id-col">Id</th>
                    <th>Nom</th>
                    <th>Logo</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disciplines as $discipline)
                <tr>
                    <td>{{{ $discipline->id }}}</td>
                    <td>{{{ $discipline->name }}}</td>
                    <td>{{{ $discipline->logo }}}</td>
                    <td class="actions">
                        <a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('admin.discipline.edit', $discipline->id) }}" class="btn btn-info primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['admin.discipline.destroy', 'id'=> $discipline->id], 'method'=>'DELETE']) !!}
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
                Pas de disciplines. <a href="{{ route('admin.discipline.create') }}"><i class="fa fa-plus"></i> En ajouter une</a>.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
