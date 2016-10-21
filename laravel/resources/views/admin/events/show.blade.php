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
@if(count($event->photos)>0)
<div class="thumbnails">
    <div class="grid-5 has-gutter">
        @foreach($event->photos as $photo)
        <div class="thumbnail">
            <a href="{{ asset(UPLOADS_PIC_FOLDER.$photo->file) }}" class="fancybox-pic" data-fancybox-group="group1"><img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}" alt=""/></a>
            <div class="actions">
                <a href="{{ route('admin.photo.show', $photo->id) }}" class="btn primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                <a href="{{ route('admin.photo.edit', $photo->id) }}" class="btn primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                    <i class="fa fa-fw fa-trash"></i>
                    {!! Form::open(['route'=>['admin.photo.destroy', 'id'=> $photo->id], 'method'=>'DELETE']) !!}
                    {!! Form::close() !!}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
        $('.fancybox-pic').fancybox({
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            arrows: true,
            nextClick: true,
            helpers: {
                thumbs: {
                    width: 50,
                    height: 50
                },
                overlay: {
                    closeClick: true, // if true, fancyBox will be closed when user clicks on the overlay
                    speedOut: 200, // duration of fadeOut animation
                    showEarly: true, // indicates if should be opened immediately or wait until the content is ready
                    locked: true   // if true, the content will be locked into overlay
                },
            }
        });
        $('.thumbnails').masonry({
            itemSelector: '.thumbnail',
            percentPosition: true
        });
</script>
@else
<div class="page-wrapper">
    <div class="dashboard-empty">
        <div class="w50 center">
            Il n'y a aucune photo pour cet évènement pour le moment.
        </div>
    </div>
</div>
@endif
@endsection