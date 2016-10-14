@extends('layouts/member')

@section('content')

{{ Form::model(Auth()->user(), ['route'=>'user.preferences.update', 'method'=>'PATCH']) }}
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        @foreach($defaults as $field=>$config)

        @if($config['type'] === 'checkbox')
        <label for="{{ $field }}_ctrl" class="input">
            <?php
            $conf = [];
            if ($preferences[$field]):
                $conf['checked'] = true;
            endif;
            $conf['id'] = $field . '_ctrl';
            ?>
            {!! Form::input('checkbox', 'preferences['.$field.']', true, $conf) !!}
            {{ $config['label'] }}
        </label>
        @else
        {!! Form::label($field.'_id', $config['label']) !!}
        {!! Form::input($config['type'], 'preferences['.$field.']', ['value'=>$preferences[$field]])!!}
        @endif

        @endforeach
    </div>
    <!-- Additionnal aside -->
    <aside class="w20 menu-second">
        {!! Form::submit('Enregistrer', ['class'=>'primary']) !!}
    </aside>
    <!-- /Additionnal aside -->
</div>
{{ Form::close() }}

@endsection
