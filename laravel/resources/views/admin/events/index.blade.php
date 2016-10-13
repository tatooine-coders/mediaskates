@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/events/section_links')
@endsection

@section('content')

<div class="page-wrapper">
    <div class="content">

        @if(count($events)>0)
        <table>
            <thead>
                <tr>
                    <th class="col-id">Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th>Discipline</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->address }}, {{ $event->zip }} {{ $event->city }}</td>
                    <td>{{ $event->date_event }}</td>
                    <td>{{ $event->discipline->name }}</td>
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
                Il n'y a aucun évènement pour le moment. <a href="{{ route('user.event.create') }}"><i class="fa fa-plus"></i> En créer un</a>.
            </div>
        </div>
        @endif

    </div>
</div>
@endsection