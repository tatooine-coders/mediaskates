@extends('layouts/simple')

@section('content')
    <div class="advancedSearch">
        {!! Form::open([
        'method' => 'POST',
        'route' => ['search_results']
        ]) !!}

        {!! Form::label('name', 'Rechercher') !!} - <span style="color: black"> {!! Form::text('name', null, ['placeholder'=>'Mots clefs']) !!}</span><br/>
        <br/>
        <br/>
        Dans : <br/>
        <br/>
        <div style="text-align: left; width: 30%; margin: auto">
            {!! Form::radio('choice', '1', true) !!}
            {!! Form::label('discipline_id', 'Discipline') !!}
            {{--{!! Form::select('discipline_id', $disciplines, null, ['required'=>true, 'placeholder' => 'Selectionnez une catégorie...']) !!}--}}
            <br/>
            {!! Form::radio('choice', '2') !!}
            {!! Form::label('event_id', 'Event') !!}
            {{--{!! Form::select('event_id', $events, null, ['required'=>true, 'placeholder' => 'Selectionnez un evenement...']) !!}--}}
            <br/>
            {!! Form::radio('choice', '3') !!}
            {!! Form::label('user_id', 'User') !!}
            <br/>
            <br/>
        </div>
        <span class="boutcolor">
            {!! Form::submit('RECHERCHER') !!}
        </span>
        {!! Form::close() !!}
        <br/>
        <br/>
        <br/>
        <br/>
        @if(isset($results))
            <div class="flex-container page-wrapper">
                <div class="flex-item-fluid content">
                    RESULTATS :<br/>
                    </br>
                    @if($results->isEmpty())
                        Pas de resultas
                    @else
                        <table class="resultSearch">
                            <thead>
                                <tr>
                                    <th class="id-col">Id</th>
                                    <th>Name</th>
                                    <th>Pseudo</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($results as $result)
                                    <tr>

                                        <td><a href="<?php echo $url ?>/<?php echo $result->id ?>">{!! $result->id !!}</a></td>
                                        <td>
                                            @if (!isset($result->name))
                                                {{ "X" }}
                                            @else
                                                {{ $result->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!isset($result->pseudo))
                                                {{ "X" }}
                                            @else
                                                {{ $result->pseudo }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!isset($result->last_name))
                                                {{"X"}}
                                            @else
                                                {{ $result->last_name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(!isset($result->first_name))
                                                {{"X"}}
                                            @else
                                                {{ $result->first_name }}
                                            @endif
                                        </td>
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        </br>
                    @endif
                </div>
        </div>
        @endif
    </div>
@endsection