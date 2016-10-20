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

<h2>Vos photos pour cet évènement</h2>
<div class="page-wrapper">
    <div class="content">
        @if(count($event->photos)>0)
            <div class="thumbnails">
                @foreach($event->photos as $photo)
                <div class="thumbnail">
                    <img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}" alt="" />
                    <div class="actions">
                        <a href="{{ route('user.photo.show', $photo->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                        <a href="{{ route('user.photo.edit', $photo->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                            <i class="fa fa-fw fa-trash"></i>
                            {!! Form::open(['route'=>['user.photo.destroy', 'id'=> $photo->id], 'method'=>'DELETE']) !!}
                            {!! Form::close() !!}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
        <div class="dashboard-empty">
            <div class="w50 center">
                Vous n'avez aucune photo pour cet évènement. <a href="{{ route('user.photo.create', ['event'=>$event->id]) }}"><i class="fa fa-fw fa-plus"></i> En ajouter...</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection