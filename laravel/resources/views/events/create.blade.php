@extends('layouts/simple')

@section('content')

    @if(count($disciplines)>0)

        <h1>Ajouter un Evenement</h1>

        {!! Form::open([
        'method' => 'POST',
        'route' => ['admin.event.store']
        ]) !!}

        {!! Form::label('name', 'Nom') !!} - {!! Form::text('name', null, ['placeholder'=>'nom de l event']) !!}<br/>
        {!! Form::label('address', 'Adresse') !!} - {!! Form::text('address', null, ['placeholder'=>'adresse de l event']) !!}<br/>
        {!! Form::label('city', 'Ville') !!} - {!! Form::text('city', null, ['placeholder'=>'Ville de l event']) !!}<br/>
        {!! Form::label('zip', 'Code Postal') !!} - {!! Form::text('zip', null, ['placeholder'=>'CP de l event']) !!}<br/>
        {!! Form::label('date_event', 'Date') !!} - {!! Form::date('date_event', null, ['placeholder'=>'date de l event']) !!}<br/>

        {!! Form::label('id_discipline', 'Discipline') !!} - {!! Form::select('discipline_id', $disciplines) !!}<br/>

        {!! Form::submit('Ajouter un event') !!}
        {!! Form::close() !!}

    @else
        Vous devez creer une discipline avant d ajouter un evenement.
    @endif

@endsection
