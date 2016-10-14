@extends('layouts/admin')

@section('sectionLinks')
    @include('admin/disciplines/section_links')
@endsection

@section('content')
<div class="page-wrapper">
        <div class="content">
            @if(count($watermarks)>0)
            <table>
                <thead>
                    <tr>
                        <th class="id-col">Id</th>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Date créa.</th>
                        <th>Date modif.</th>
                        <th class="actions">Actions</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($watermarks as $watermark)
                        <tr>
                            <td>{{{ $watermark->id }}}</td><br/>
                            <td>{{{ $watermark->name }}}</td><br/>
                            <td>{{{ $watermark->type }}}</td><br/>
                            <td>{{{ $watermark->description }}}</td>
                            <td>{{{ $watermark->created_at }}}</td>
                            <td>{{{ $watermark->updated_at }}}</td>
                            <td class="actions">
                                <a href="{{ route('admin.watermark.show', $watermark->id) }}" class="btn btn-info primary" title="Afficher"><i class="fa fa-fw fa-eye"></i></a>
                                <a href="{{ route('admin.watermark.edit', $watermark->id) }}" class="btn btn-info primary" title="Editer"><i class="fa fa-fw fa-pencil"></i></a>
                                <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-info grave" title="Supprimer">
                                    <i class="fa fa-fw fa-trash"></i>
                        {!! Form::open(['route'=>['admin.watermark.destroy', 'id'=> $watermark->id], 'method'=>'DELETE']) !!}
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
                Pas de watermarks.
             </div>
        </div>
        @endif
    </div>
</div>
@endsection