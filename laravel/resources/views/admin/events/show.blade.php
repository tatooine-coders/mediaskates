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

<h2>Photos</h2>
<div class="page-wrapper">
    <div class="content flex-container">
        @if(count($event->photos)>0)
        @foreach($event->photos as $photo)
        <div class="image-item flex-item-fluid">
            <img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}" alt=""/>
            <div class="actions">
                <a href="{{ route('admin.photo.show', $photo->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                <a href="{{ route('admin.photo.edit', $photo->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                    <i class="fa fa-fw fa-trash"></i>
                    {!! Form::open(['route'=>['user.photo.destroy', 'id'=> $photo->id], 'method'=>'DELETE']) !!}
                    {!! Form::close() !!}
                </a>
            </div>
        </div>
        @endforeach
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