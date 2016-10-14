@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/photos/section_links')
@endsection

@section('content')
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            <small>
                <i class="fa fa-fw fa-calendar"></i> Créé le {{ $photo->created_at }}
                @if($photo->created_at != $photo->updated_at)
                    - <i class="fa fa-fw fa-refresh"></i> modifié le {{ $photo->created_at }}
                @endif
            </small>
            <dl>
                <dt>File :</dt>
                <dd>{{ $photo->file }}</dd>
                <dt>Event :</dt>
                <dd>{{ $photo->event->name }}</dd>
            </dl>
        </div>
        <aside class="w20 menu-second">
            <a href="{{ route('admin.photo.edit', $photo->id) }}" class="btn btn primary block">
                <i class="fa fa-fw fa-pencil"></i> Editer
            </a>
            <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
                <i class="fa fa-fw fa-trash"></i> Supprimer
                {!! Form::open(['route'=>['admin.photo.destroy', 'id'=> $photo->id], 'method'=>'DELETE']) !!}
                {!! Form::close() !!}
            </a>
        </aside>
    </div>
@endsection