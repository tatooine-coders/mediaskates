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
                    <img src="{{ asset(UPLOADS_THUMB_FOLDER.$photo->file) }}" alt="{{ $photo->file }}" />
                </div>
                <div class="one-half">
                    {!! Form::label('id_event', 'Event') !!}
                    {!! Form::select('event_id', $events) !!}

                    {!! Form::label('id_watermark', 'Watermark') !!}
                    {!! Form::select('watermark_id', $watermarks) !!}

                    {!! Form::label('id_license', 'License') !!}
                    {!! Form::select('license_id', $licenses) !!}
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
