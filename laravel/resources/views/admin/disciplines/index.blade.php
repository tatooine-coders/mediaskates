@extends('layouts/admin')

@section('content')
<div class="flex-container page-wrapper">
    <div class="flex-item-fluid content">
        @if(count($disciplines)> 0 )
        <table>
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Logo</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($disciplines as $discipline)
              <tr>
                  <td>{{{ $discipline->id }}}</td>
                  <td>{{{ $discipline->name }}}</td>
                  <td>{{{ $discipline->logo }}}</td>
                  <td class="action">
                      <a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info primary"><i class="fa fa-fw fa-eye"></i></a>
                      <a href="{{ route('admin.discipline.show', $discipline->id) }}" class="btn btn-info grave"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <div class="dashboard">
            Pas de disciplines.
        </div>
        @endif
    </div>
</div>
@endsection
