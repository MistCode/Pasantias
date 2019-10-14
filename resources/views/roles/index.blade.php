@extends('layouts.App')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="panel-heading btn btn-info" style="margin-bottom: 10px;margin-top: 10px;">
                    Roles
                </div>
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan

                <div class="panel-body">
                    <table class="table table-striped table-hover shadow">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                @can('roles.show')
                                <td width="10px">
                                    <a href="{{ route('roles.show', $role->id) }}" 
                                    class="btn btn-sm btn btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('roles.edit')
                                <td width="10px">
                                    <a href="{{ route('roles.edit', $role->id) }}" 
                                    class="btn btn-sm btn btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('roles.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['roles.destroy', $role->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection