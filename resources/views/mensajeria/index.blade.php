@extends('layouts.App')
@section('title','Mensajeria')
@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card border-primary" style="margin-top: 10px; margin-bottom: 5px;">
                <div class="card-header bg-transparent border-primary text-center">
                	Mail@Cacique
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @can('mensajeria.create')
            <a href="{{ route('mensajeria.create') }}" class="card title btn btn-outline-success border border-success">
                <i class="fa fa-envelope"> Nuevo Mensaje</i>
            </a>
        @endcan
    </div>
    
    <div class="row">
        @foreach($correos as $correo)
            <div class="col-sm">
                <div class="card border-primary text-center shadow" style="width: 12rem; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;">
                    <div class="card-header border border-info btn btn-outline-info">
                        <h4>{{ $correo->name }}</h4>
                        <small>{{ $correo->created_at }}</small>
                    </div>
                    <div class="card-body">
                        <form class="form-group" method="POST" action="{{ route('mensajeria.destroy', $correo->id) }}" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                            @can('mensajeria.show')
                                <a href="{{ route('mensajeria.show', $correo->id) }}" class="btn btn-outline-primary">
                                    <i class="far fa-envelope-open"></i>
                                </a>
                            @endcan
                            @can('mensajeria.destroy')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        {{ $correos->render() }}
</div>

@endsection