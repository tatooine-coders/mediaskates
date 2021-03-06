@extends('layouts/simple')

@section('content')
@if(count($users)>0)
@foreach($users as $user)
        @foreach($user->roles as $u_role)
            @if($u_role->name === 'photograph')
                <div class="utils">
                    <h2>
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
            @endif
        @endforeach
    @endforeach
@else
Pas de photographe enregistré.
@endif
@endsection