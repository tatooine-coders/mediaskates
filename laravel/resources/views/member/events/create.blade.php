@extends('layouts/member')

@section('sectionLinks')
@include('member/events/section_links')
@endsection

@section('content')

{{ Form::open(['route'=>'user.event.store', 'method'=>'POST']) }}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('name', 'Nom de l\'évènement') !!}
                {!! Form::text('name', null, ['required'=>true, 'placeholder'=>'24h de la brindillette']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('date_event', 'Date') !!}
                {!! Form::date('date_event', null, ['required'=>true, 'placeholder'=>'aaaa/mm/jj']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('discipline_id', 'Discipline') !!}
                {!! Form::select('discipline_id', $disciplines, null, ['required'=>true, 'placeholder' => 'Selectionnez une catégorie...']) !!}
            </div>
        </div>
        <div class="grid has-gutter">
            <div class="one-half">
                {!! Form::label('address', 'Lieu') !!}
                {!! Form::text('address', null, ['required'=>true, 'placeholder'=>'5 rue du Bonheur']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('zip', 'Code postal') !!}
                {!! Form::text('zip', null, ['required'=>true, 'placeholder'=>'00001']) !!}
            </div>
            <div class="one-quarter">
                {!! Form::label('city', 'Ville') !!}
                {!! Form::text('city', null, ['required'=>true, 'placeholder'=>'Mufflins']) !!}
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
