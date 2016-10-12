@extends('layouts/admin')

@section('content')
@if(count($issues['RnP']))
<h2>Routes absentes des permissions</h2>
<div class="page-wrapper">
    <div class="content">
        <p>
            Les routes listées ci-dessous sont absentes du tableau de permissions.
        </p>
        <table>
            <thead>
                <tr>
                    <th>Middleware</th>
                    <th>Uses</th>
                    <th>Controller</th>
                    <th>Namespace</th>
                    <th>Prefix</th>
                </tr>
            </thead>
            <tbody class="small">
                @foreach($issues['RnP'] as $k=>$issue)
                <tr>
                    <td>{{ var_dump($issue['middleware']) }}</td>
                    <td>{{ $issue['uses'] }}</td>
                    <td>{{ $issue['controller'] }}</td>
                    <td>{{ $issue['namespace'] }}</td>
                    <td>{{ $issue['prefix'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<h2>Routes déclarées</h2>
<div class="page-wrapper">
    <div class="content">
        @if(count($perms)> 0 )
        <a href="#" onClick="$('.perm_ok').toggle()" class="btn block primary">Cacher les routes valides</a>
        <p>Les permissions en rouge ne sont pas déclarées dans les routes.</p>
        <table>
            <thead>
              <tr>
                <th class="id-col">Id</th>
                <th>Nom</th>
                <th>Nom affiché</th>
                <th>Description</th>
                <th>Date créa.</th>
                <th>Date mod.</th>
                <th class="actions">Actions</th>
              </tr>
            </thead>
            <tbody class="small">
              @foreach($perms as $perm)
              <tr class="{{ (isset($issues['PnR'][$perm->id])? 'error' : 'perm_ok') }}">
                <td>{{ $perm->id }}</td>
                <td>{{ $perm->name }}</td>
                <td>{{ $perm->display_name }}</td>
                <td>{{ $perm->description }}</td>
                <td>{{ $perm->created_at }}</td>
                <td>{{ $perm->updated_at }}</td>
                <td class="actions">
                    <a href="{{ route('admin.permission.show', $perm->id) }}" class="btn btn-info primary"><i class="fa fa-fw fa-eye"></i></a>
                    <a href="{{ route('admin.permission.show', $perm->id) }}" class="btn btn-info grave"><i class="fa fa-fw fa-trash"></i></a>
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
