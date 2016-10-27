@extends('layouts/simple')

@section('content')
@if(count($users)>0)
@foreach($users as $user)

<h2>
    [{{ link_to('user/'.$user->id, 'Voir')}}]
    [{{ link_to('user/'.$user->id.'/edit', 'Editer')}}]
    - {{{ $user->pseudo }}}
</h2>

<div class="utils">
    <ul>
        <img class="avatar avatar-tiny" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/></li>
        <li>Prénom : {{{ $user->first_name }}}</li> 
        <li>Nom : {{{ $user->last_name }}}</li>
        <li>Pseudo : {{{ $user->pseudo }}}</li>
        <li>Www : {{{ $user->site_web }}}</li>
        <li>Facebook : {{{ $user->facebook }}}</li>
        <li>Google : {{{ $user->google }}}</li>
        <li>Twitter : {{{ $user->twitter }}}</li>
        
        <li><div class="">Biographie : <br>{{{ $user->biography }}}
        </div></li>
     </ul>
</div>

@endforeach
@else
Pas d'utilisateurs.
@endif
@endsection