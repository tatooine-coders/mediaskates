@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/photos/section_links')
@endsection

@section('content')

    {{ Form::model($photo, ['route'=>['admin.photo.update', $photo->id], 'method'=>'PATCH']) }}
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            <div class="grid has-gutter">
                <div class="one-half">
                    {!! Form::label('file', 'url') !!}
                    {!! Form::text('file', null, ['required'=>true, 'placeholder'=>'file']) !!}
                </div>
                <div class="one-quarter">
                    {!! Form::label('id_event', 'Event') !!}
                    {!! Form::select('event_id', $events) !!}<br/>
                </div>
                <div class="one-quarter">
                    {!! Form::label('id_watermark', 'Watermark') !!}
                    {!! Form::select('watermark_id', $watermarks) !!}<br/>
                </div>
            </div>
            <div class="grid has-gutter">
                <div class="one-quarter">
                    {!! Form::label('id_license', 'License') !!}
                    {!! Form::select('license_id', $licenses) !!}<br/>
                </div>
            </div>

        </div>
        <!-- Additionnal aside -->
        <aside class="w20 menu-second">
            {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
        </aside>
        <!-- /Additionnal aside -->
    </div>
    {{ Form::close() }}
@endsection
