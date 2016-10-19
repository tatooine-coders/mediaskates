@extends('layouts/admin')

@section('sectionLinks')
@include('admin/disciplines/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <small>
            <i class="fa fa-fw fa-calendar"></i> Créée le {{ $discipline->created_at }}
            @if($discipline->created_at != $discipline->updated_at)
            - <i class="fa fa-fw fa-refresh"></i> modifiée le {{ $discipline->updated_at }}
            @endif
        </small>
        <dl>
            <dt>Nom:</dt>
            <dd>{{ $discipline->name }}</dd>
            <dt>Logo:</dt>
            <dd>
                <div><img src="{{ asset(DISCIPLINES_THUMB_FOLDER.$discipline->logo) }}" alt=""/></div>
                {{ $discipline->logo }}
            </dd>
        </dl>
    </div>
    <aside class="w20 menu-second">
        <a href="{{ route('admin.discipline.edit', $discipline->id) }}" class="btn btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
            <i class="fa fa-fw fa-trash"></i> Supprimer
            {!! Form::open(['route'=>['admin.discipline.destroy', 'id'=> $discipline->id], 'method'=>'DELETE']) !!}
            {!! Form::close() !!}
        </a>
    </aside>
</div>

<h2>Evènements liés</h2>
<div class="container page-wrapper">
    <div class="content">
        @if(count($discipline->events)>0)
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
                @foreach($discipline->events as $event)
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
                            {!! Form::open(['route'=>['admin.event.destroy', 'id'=> $event->id], 'method'=>'DELETE']) !!}
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
                Il n'y a aucun évènement pour le moment. <a href="{{ route('admin.event.create') }}"><i class="fa fa-plus"></i> En créer un</a>.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection