@extends('layouts/member')

@section('sectionLinks')
@include('member/photos/section_links')
@endsection

@section('content')

{{ Form::open(['route'=>'user.photo.store', 'method'=>'POST', 'files'=>true]) }}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-third">
                {!! Form::label('event_id', 'Evènement') !!}
                <select name="event_id" required="required">
                    @foreach($disciplines as $d)
                    <optgroup label="{{ $d['name'] }}">
                        @foreach($d['events'] as $k=>$e)
                        <option value="{{ $e['id'] }}"{{$event==$e['id']?'selected="selected"':''}}>{{ $e['date_event'] }} - {{ $e['name'] }}</option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <div class="one-third">
                {!! Form::label('watermark_id', 'Type de watermark') !!}
                {!! Form::select('watermark_id', $watermarks, null, ['required'=>true]) !!}
            </div>
            <div class="one-third">
                {!! Form::label('license_id', 'License') !!}
                {!! Form::select('license_id', $licenses, null, ['required'=>true]) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-half">
                <section id="dropzone" class="flex-container-v">
                    <div class="center">
                        Déplacez vos fichiers ici
                    </div>
                    <div class="dropzone-thumbs grid-3 has-gutter">
                    </div>
                </section>
            </div>
            <div class="one-half">
                <p>
                    Si vous ne pouvez pas utiliser le multi upload, veuillez utiliser le formulaire suivant:
                </p>
                <div id="fileZone">
                    {!! Form::file('files[]') !!}
                    {!! Form::file('files[]') !!}
                    {!! Form::file('files[]') !!}
                    {!! Form::file('files[]') !!}
                    {!! Form::file('files[]') !!}
                </div>
                <a class="btn btn-primary" id="addBtn"><i class="fa fa-fw fa-plus"></i> Ajouter un fichier</a>
                <script src="{{ asset('js/jquery.ajax-upload.js') }}"></script>
                <script>
var fileList = new Array();
$('#addBtn').click(function (e) {
	var field = "{!! addslashes(Form::file('files[]')) !!}";
	$('#fileZone').append(field);
});
// Attach listeners
setDropListener({
	listenTo: '#dropzone',
	writeTo: '#dropzone .dropzone-thumbs',
	sendTo: '{{ route('user.photo.ajax_upload') }}',
	formSession: '{{ $formSession }}',
	imageURL: '{{ asset(UPLOAD_TEMP_FOLDER.$formSession.'/') }}',
    abortURL: '{{route('user.photo.ajax_cancel') }}'
});
                </script>
            </div>
        </div>
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::hidden('formSession', $formSession) !!}
        {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
{{ Form::close() }}
@endsection
