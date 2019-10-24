@extends('layouts.App')
@section('title','Mensajeria')
@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="card-header bg-transparent border-primary">
                    <a href="{{ route('mensajeria.index') }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <strong class="offset-5">
                        Asunto: {{ $correo->name }}
                    </strong>
                </div>
                <div class="card-header">
                    <small>
                        De: {{ $correo->sender_id }}
                    </small>
                    <br>
                    <small>
                        Para: {{ $correo->recipient_id }}
                    </small>
                    <small class="offset-7">
                        Fecha de Envio: {{ $correo->created_at }}
                    </small>
                </div>
                <div class="card-body">
					<p class="card-text">
                        {{ $correo->body }}
                    </p>
                </div>
            </div>
            <form class="form-group" method="POST" action="{{ route('mensajeria.destroy', $correo->id) }}" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
                @can('grupos.create')
                    <a href="{{ route('mensajeria.create') }}" class="offset-5 btn btn-success">
                        <i class="fa fa-envelope"></i>
                    </a>
                @endcan
                @can('grupos.destroy')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>

@endsection