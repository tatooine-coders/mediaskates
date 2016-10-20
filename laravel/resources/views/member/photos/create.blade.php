@extends('layouts/member')

@section('sectionLinks')
@include('member/photos/section_links')
@endsection

@section('content')

{{ Form::open(['route'=>'user.photo.store', 'method'=>'POST', 'files'=>true]) }}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('event_id', 'Evènement') !!}
                <select name="event_id"{{!empty($event)?' disabled':''}}>
                    @foreach($disciplines as $d)
                    <optgroup label="{{ $d['name'] }}">
                        @foreach($d['events'] as $k=>$e)
                        <option value="{{ $e['id'] }}"{{$event==$e['id']?'selected="selected"':''}}>{{ $e['date_event'] }} - {{ $e['name'] }}</option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="one-half">
                {!! Form::label('file', 'Fichier') !!}
                {!! Form::file('file') !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('watermark_id', 'Type de watermark') !!}
                {!! Form::select('watermark_id', $watermarks, null) !!}
            </div>
            <div class="one-half">
                {!! Form::label('license_id', 'License') !!}
                {!! Form::select('license_id', $licenses, null) !!}
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
