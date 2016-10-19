@extends('layouts/member')

@section('sectionLinks')
@include('member/photos/section_links')
@endsection

@section('content')

<div class="page-wrapper">
    <div class="content">

        @if(count($photos)>0)
        <table>
            <thead>
                <tr>
                    <th>Evènement</th>
                    <th>Image</th>
                    <th>Date Créa.</th>
                    <th>Date Modif.</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->event->name }}</td>
                    <td><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}" alt=""/></td>
                    <td>{{ $photo->created_at }}</td>
                    <td>{{ $photo->modified_at }}</td>
                    <td class="actions">
                        <a href="{{ route('user.photo.show', $photo->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('user.photo.edit', $photo->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
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
                Il n'y a aucune photo pour le moment. <a href="{{ route('user.photo.create') }}"><i class="fa fa-plus"></i> En ajouter une</a>.
            </div>
        </div>
        @endif

    </div>
</div>
@endsection