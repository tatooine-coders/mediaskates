@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/disciplines/section_links')
@endsection

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <dl>
            <dt>Nom:</dt>
            <dd>{{ $discipline->name }}</dd>
            <dt>Logo:</dt>
            <dd>{{ $discipline->logo }}</dd>
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
</pre>
@endsection