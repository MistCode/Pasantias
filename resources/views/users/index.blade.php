@extends('layouts.App')
@section('title','Usuarios')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="panel-heading btn btn-info">
                    Usuarios
                </div>

                <div class="panel-body">
                    <table id="myTable" class="table table-striped table-hover table-dark shadow" style="margin-bottom: 10px;margin-top: 10px;">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->isOnline())
                                        <li class="text-success">
                                            Online
                                        </li>
                                    @else
                                        <li class="text-muted">
                                            Offline
                                        </li>
                                    @endif
                                </td>
                                @can('users.show')
                                <td width="10px">
                                    <a href="{{ route('users.show', $user->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('users.edit')
                                <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('users.destroy')
                                <td width="10px">
                                    <form class="form-group" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @method('DELETE')
                                    @csrf
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection