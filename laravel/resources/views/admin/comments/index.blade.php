@extends('layouts/admin')
@section('content')
    <div class="flex-container page-wrapper">
        <div class="flex-item-fluid content">
            @if(count($comments)> 0 )
                <table>
                    <thead>
                    <tr>
                        <th class="id-col">Id</th>
                        <th>Text</th>
                        <th>Date créa</th>
                        <th class="actions">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->text }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td class="actions">
                                <a href="{{ route('admin.comment.show', $comment->id) }}" class="btn btn-info primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                                    <i class="fa fa-fw fa-trash"></i>
                                    {!! Form::open(['route'=>['admin.comment.destroy', 'id'=> $comment->id], 'method'=>'DELETE']) !!}
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