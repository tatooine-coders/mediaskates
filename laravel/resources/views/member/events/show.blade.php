@extends('layouts/member')

@section('sectionLinks')
@include('member/events/section_links')
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
            <dt>Ajouté par :</dt>
            <dd>{{ $event->user->pseudo }}</dd>
        </dl>
    </div>
    <aside class="w20 menu-second">
        @if($event->user_id === Auth()->user()->id)
        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        @else
        <a class="btn disabled block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        @endif
    </aside>
</div>
@endsection