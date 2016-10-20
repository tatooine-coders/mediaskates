@extends('layouts/member')

@section('sectionLinks')
@include('member/events/section_links')
@endsection

@section('content')

<div class="page-wrapper">
    <div class="content">
        @if(count($events)>0)
        <table>
            <thead>
                <tr>
                    <th class="id-col">Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th>Ajouté par</th>
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
                    <td>{{ $event->user->pseudo }}</td>
                    <td class="actions">
                        <a href="{{ route('user.event.show', $event->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        @if($event->user_id == Auth()->user()->id)
                        <a href="{{ route('user.event.edit', $event->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        @else
                        <a class="disabled btn"><i class="fa fa-pencil fa-fw"></i></a>
                        @endif
                        <a href="{{ route('user.photo.create', ['event'=>$event->id]) }}" class="btn primary" title="Ajouter une photo"><i class="fa fa-fw fa-plus"></i></a>
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