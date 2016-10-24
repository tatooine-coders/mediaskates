@extends('layouts/simple')

@section('content')
@if(count($users)>0)
@foreach($users as $user)
<h2>
    [{{ link_to('user/'.$user->id, 'Voir')}}]
    [{{ link_to('user/'.$user->id.'/edit', 'Editer')}}]
    - {{{ $user->pseudo }}}
</h2>
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
{{{ $user->role_id }}}
{{{ $user->role->name }}}
</pre>
@endforeach
@else
Pas d'utilisateurs.
@endif
@endsection