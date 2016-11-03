@extends('layouts/admin')
@section('content')
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            @if(count($tags)> 0 )
                <table>
                    <thead>
                    <tr>
                        <th class="id-col">Id</th>
                        <th>Pseudo</th>
                        <th>Photo</th>
                        <th>Date créa</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->user->pseudo }}</td>
                            <td>{{ $tag->photo_id }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td class="actions">
                                <a href="{{ route('photo.show', $tag->photo_id) }}" class="btn btn-info primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                                    <i class="fa fa-fw fa-trash"></i>
                                    {!! Form::open(['route'=>['admin.tag.destroy', 'id'=> $tag->id], 'method'=>'DELETE']) !!}
                                    {!! Form::close() !!}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="dashboard-empty w50 center">
                    <div>
                        Pas de comments.
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection