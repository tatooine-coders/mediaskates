@extends('layouts/admin')

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <dl>
            <dt>Nom:</dt>
            <dd>{{ $license->name }}</dd>
            <dt>Url:</dt>
            <dd>{{ link_to($license->url, $license->url, ['target'=>'_blank']) }}</dd>
        </dl>
    </div>
    <aside class="w20 menu-second">
        <a href="{{ route('admin.license.edit', $license->id) }}" class="btn btn primary block">
            <i class="fa fa-fw fa-pencil"></i> Editer
        </a>
        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave block" title="Supprimer">
            <i class="fa fa-fw fa-trash"></i> Supprimer
            {!! Form::open(['route'=>['admin.license.destroy', 'id'=> $license->id], 'method'=>'DELETE']) !!}
            {!! Form::close() !!}
        </a>
    </aside>
</div>
</pre>
@endsection