@extends('layouts/admin')

@section('sectionLinks')
@include('admin/events/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <small>
            <i class="fa fa-fw fa-calendar"></i> Créé le {{ $event->created_at }}
            @if($event->created_at != $event->updated_at)
            - <i class="fa fa-fw fa-refresh"></i> modifié le {{ $event->updated_at }}
            @endif
        </small>
        <dl>
            <dt>Nom :</dt>
            <dd>{{ $event->name }}</dd>
            <dt>Discipline :</dt>
            <dd>{{ $event->discipline->name }}</dd>
            <dt>Adresse :</dt>
            <dd>{{ $event->address }}, {{ $event->zip }} {{ $event->city }}</dd>
            <dt>Date :</dt>
            <dd>{{ $event->date_event }}</dd>
        </dl>
    </div>
    <aside class="w20 menu-second">
        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
            <i class="fa fa-fw fa-trash"></i> Supprimer
            {!! Form::open(['route'=>['admin.event.destroy', 'id'=> $event->id], 'method'=>'DELETE']) !!}
            {!! Form::close() !!}
        </a>
    </aside>
</div>
@endsection