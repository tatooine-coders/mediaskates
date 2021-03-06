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
                    <th class="id-col">Id</th>
                    <th>Nb photos</th>
                    <th><a href="{{ route('admin.event.index', ['order'=>'name', 'direction'=>($order==='name'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='name'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Nom</a></th>
                    <th>
                        Adresse
                        (<a href="{{ route('admin.event.index', ['order'=>'address', 'direction'=>($order==='address'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='address'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Adresse</a>,
                        <a href="{{ route('admin.event.index', ['order'=>'zip', 'direction'=>($order==='zip'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='zip'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Code postal</a>,
                        <a href="{{ route('admin.event.index', ['order'=>'city', 'direction'=>($order==='city'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='city'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Ville</a>)
                    </th>
                    <th><a href="{{ route('admin.event.index', ['order'=>'date_event', 'direction'=>($order==='date_event'?($direction==='asc'?'desc':'asc'):'asc')]) }}"><i class="fa fa-fw fa-sort-{{ ($order=='date_event'?($direction=='asc'?'desc':'asc'):'asc') }}"></i> Date</a></th>
                    <th>Discipline</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->photos_count }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->address }}, {{ $event->zip }} {{ $event->city }}</td>
                    <td>{{ $event->date_event }}</td>
                    <td>{{ $event->discipline->name }}</td>
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