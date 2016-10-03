@extends('layouts/simple')

@section('content')
<h2>
	[ link_to(route('user.index'), '< Liste')}}]
	[ link_to(route('user.edit', $user->id), 'Editer')}}]
	- {{{ $user->pseudo }}}</h2>
<pre>
{{{ $user->first_name }}}
{{{ $user->last_name }}}
{{{ $user->pseudo }}}
{{{ $user->email }}}
{{ $user->profile_pic }}
{{ $user->active }}
{{ $user->preferences }}
{{{ $user->site_web }}}
{{{ $user->facebook }}}
{{{ $user->google }}}
{{{ $user->twitter }}}
{{{ $user->biography }}}
</pre>
@endsection