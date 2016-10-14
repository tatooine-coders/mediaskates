
@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/photos/section_links')
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">

            @if(count($photos)>0)
                <table>
                    <thead>
                    <tr>
                        <th class="col-id">Id</th>
                        <th>File</th>
                        <th>Evenement</th>
                        <th>Date photo</th>
                        <th>Discipline</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td>{{ $photo->file}}</td>
                            <td>{{ $photo->event->name }}</td>
                            <td>{{ $photo->created_at }}</td>
                            <td>{{ $photo->event->discipline->name }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.photo.show', $photo->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                                <a href="{{ route('admin.photo.edit', $photo->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                                    <i class="fa fa-fw fa-trash"></i>
                                    {!! Form::open(['route'=>['user.photo.destroy', 'id'=> $photo->id], 'method'=>'DELETE']) !!}
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
                        Il n'y a aucun évènement pour le moment. <a href="{{ route('user.photo.create') }}"><i class="fa fa-plus"></i> En créer un</a>.
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection