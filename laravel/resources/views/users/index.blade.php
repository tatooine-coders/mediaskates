@extends('layouts/simple')

@section('content')
@if(count($users)>0)
@foreach($users as $user)
<div class="utils">
    <h2>
        <!--[{{ link_to('user/'.$user->id, 'Voir')}}]
         [{{ link_to('user/'.$user->id.'/edit', 'Editer')}}] -->
        {{{ $user->pseudo }}}
    </h2>

    <ul>
        <a href="{{('user/'.$user->id)}}">
            <img class="avatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/>
        </a>
        <li>Prénom : {{{ $user->first_name }}}</li> 
        <li>Nom : {{{ $user->last_name }}}</li>
        <li>Pseudo : {{{ $user->pseudo }}}</li>
    </ul>

</div>

@endforeach
@else
Pas d'utilisateurs.
@endif
@endsection