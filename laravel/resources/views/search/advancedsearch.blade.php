@extends('layouts/simple')

@section('content')
    <h1>Recherche avancée</h1>

    {!! Form::open([
    'method' => 'POST',
    'route' => ['search_results']
    ]) !!}

    {!! Form::label('name', 'Rechercher') !!} - {!! Form::text('name', null, ['placeholder'=>'Mots clefs']) !!}<br/>
    <br/>
    <br/>
    Dans : <br/>
    <br/>
    {!! Form::radio('choice', '1') !!}
    {!! Form::label('discipline_id', 'Discipline') !!}
    {{--{!! Form::select('discipline_id', $disciplines, null, ['required'=>true, 'placeholder' => 'Selectionnez une catégorie...']) !!}--}}
    <br/>
    {!! Form::radio('choice', '2') !!}
    {!! Form::label('event_id', 'Event') !!}
    {{--{!! Form::select('event_id', $events, null, ['required'=>true, 'placeholder' => 'Selectionnez un evenement...']) !!}--}}
    <br/>
    {!! Form::radio('choice', '3') !!}
    {!! Form::label('user_id', 'User pseudo') !!}
    <br/>
    <br/>

    {!! Form::submit('RECHERCHER') !!}
    {!! Form::close() !!}
    <br/>
    <br/>
    @if(isset($results))
        RESULTATS :<br/>
        @foreach($results as $result)
            <tr>
                <td>{!! $result !!}</td><br/>
            </tr>
        <br/>
        @endforeach
    @endif

@endsection