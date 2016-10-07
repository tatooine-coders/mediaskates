@extends('layouts/admin')

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        @if(count($disciplines)> 0 )
        <table>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Logo</th>
            </tr>
            @foreach($disciplines as $discipline)
            <tr>
                <td>{{{ $discipline->id }}}</td>
                <td>{{{ $discipline->name }}}</td>
                <td>{{{ $discipline->logo }}}</td>
                <td>
                    <a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info">View Discipline</a>
                    <a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info">View Discipline</a>
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <div class="dashboard">
            Pas de disciplines.
        </div>
        @endif
    </div>
</div>
@endsection