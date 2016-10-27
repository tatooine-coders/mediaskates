@extends('layouts/simple')

@section('content')
@if(count($users)>0)
@foreach($users as $user)
<div class="utils">
<h2>
    [{{ link_to('user/'.$user->id, 'Voir')}}]
    - {{{ $user->pseudo }}}
</h2>



    <ul>
        <img class="avatar" src="{{ asset(PROFILE_PICS_FOLDER . (!empty($user->profile_pic)?$user->profile_pic:DEFAULT_PROFILE_PIC)) }}"/>
        <li>Prénom : {{{ $user->first_name }}}</li>
        <li>Nom : {{{ $user->last_name }}}</li>
        <li>Pseudo : {{{ $user->pseudo }}}</li>
    </ul>
</div>

=======
<pre>
{{{ $user->first_name }}}
{{{ $user->last_name }}}
{{{ $user->pseudo }}}
{{{ $user->email }}}
{{{ $user->profile_pic }}}
{{{ $user->active }}}
{{{ $user->preferences }}}
{{{ $user->site_web }}}
{{{ $user->facebook }}}
{{{ $user->google }}}
{{{ $user->twitter }}}
{{{ $user->biography }}}

</pre>
@endforeach
@else
Pas d'utilisateurs.
@endif
@endsection