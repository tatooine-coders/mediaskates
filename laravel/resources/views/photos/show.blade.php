@extends('layouts/simple')
@section('content')
<div class="flex">
    <div id="photo">
        <small>
                <i class="fa fa-fw fa-calendar"></i> Créé le {{ $photo->created_at }}
                @if($photo->created_at != $photo->updated_at)
                    - <i class="fa fa-fw fa-refresh"></i> modifié le {{ $photo->created_at }}
                @endif
        </small>
            <dl>
                <img src="{{ asset(UPLOADS_PIC_FOLDER.$photo->file) }}"/>
                <dt>Event : {{ $photo->event->name }}</dt>
            </dl>
    </div>

    {{--affichage des commentaires--}}
    <div id="comments">
        @if(count($photo->comments)>0)
        <h2>Commentaire(s)</h2>
        @foreach($photo->comments as $comment)
        Le {{ $comment->created_at }}</br>

        {{ $comment->user->pseudo }} à ecrit : </br>
        {{ $comment->text }}</br>
        </br>

        @endforeach

        @endif

        {{--affichage ajout commentaire--}}
        @if(Laratrust::hasRole('member'))

        <h2>Ajouter un Commentaire</h2>

        {!! Form::open([
        'method' => 'POST',
        'route' => ['user.comment.store']
        ]) !!}

        {{ Form::hidden('photo_id',  $photo->id  ) }}
        {{ Form::textarea('text', 'votre commentaire') }}<br/>

        {!! Form::submit('Ajouter un commentaire') !!}
        {!! Form::close() !!}
        <div id="votes" style="background-color:#FFF;">
            <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                <i class="fa fa-fw fa-arrow-circle-o-up fa-2x" style="color:green;cursor:pointer;"></i>
                {!! Form::open(['route'=>['user.vote.do_vote', 'photo_id'=> $photo->id], 'method'=>'POST']) !!}
                {!! Form::close() !!}
            </a>

            {{ $photo->votes_count }}

        </div>
        @endif
    </div>

</div>
@endsection