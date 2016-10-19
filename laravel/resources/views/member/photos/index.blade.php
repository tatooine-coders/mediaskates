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
                    <th class="id-col">Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->address }}, {{ $event->zip }} {{ $event->city }}</td>
                    <td>{{ $event->date_event }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.event.show', $event->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['user.event.destroy', 'id'=> $event->id], 'method'=>'DELETE']) !!}
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