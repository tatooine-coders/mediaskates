@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/photos/section_links')
@endsection

@section('content')

    @if(count($events)>0)

    {!! Form::open([
    'method' => 'POST',
    'route' => ['admin.photo.store']
    ]) !!}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            {!! Form::label('file', 'File') !!}
            {!! Form::text('file', null, ['placeholder'=>'File']) !!}

            {!! Form::label('id_event', 'Event') !!} - {!! Form::select('event_id', $events) !!}<br/>
            {!! Form::label('id_watermark', 'Watermark') !!} - {!! Form::select('watermark_id', $watermarks) !!}<br/>
            {!! Form::label('id_license', 'License') !!} - {!! Form::select('license_id', $licenses) !!}<br/>
        </div>
        <!-- Additionnal aside -->
        <aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
        </aside>
        <!-- /Additionnal aside -->
    </div>
    {!! Form::close() !!}

    @else
        Vous devez creer un event avant d ajouter des photos.
    @endif
@endsection