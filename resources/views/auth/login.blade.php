@extends('layouts/simple')
@section('pageTitle','Identification')
@section('content')
<div class="form-bloc">
    <div class="formulaire">
        <!--   <h2>Connexion</h2> -->
        <div class="form-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="form-input">Adresse Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))<br>
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="form-input">Mot de Passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="form-group">
                    <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Connexion
                </button>
                <br>
                <a class="pw" href="{{ url('/password/reset') }}">Mot de passe oublié?</a>              
            </form>

        </div>
    </div>
</div>
@endsection