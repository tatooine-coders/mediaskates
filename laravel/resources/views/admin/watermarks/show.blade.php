@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/watermarks/section_links')
@endsection

@section('content')
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            <small>
                <i class="fa fa-fw fa-calendar"></i> Créée le {{ $watermark->created_at }}
                @if($watermark->created_at != $watermark->updated_at)
                    - <i class="fa fa-fw fa-refresh"></i> modifiée le {{ $watermark->created_at }}
                @endif
            </small>
            <dl>
                <dt>Nom:</dt>
                <dd>{{ $watermark->name }}</dd>
                <dt>Type:</dt>
                <dd>{{ $watermark->type }}</dd>
                <dt>Description:</dt>
                <dd>{{ $watermark->description }}</dd>
            </dl>
        </div>
        <aside class="w20 menu-second">
            <a href="{{ route('admin.watermark.edit', $watermark->id) }}" class="btn btn primary block">
                <i class="fa fa-fw fa-pencil"></i> Editer
            </a>
            <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
                <i class="fa fa-fw fa-trash"></i> Supprimer
                {!! Form::open(['route'=>['admin.watermark.destroy', 'id'=> $watermark->id], 'method'=>'DELETE']) !!}
                {!! Form::close() !!}
            </a>
        </aside>
    </div>
@endsection