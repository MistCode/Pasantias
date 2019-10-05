@extends('layouts.app')
@section('title','Crear Comunidad Nueva')
@section('content')
<div class="card shadow border border-warning" style="margin-top: 30px;">
@include('common.errors')
	<div class="container">
		<form class="form-group" method="POST" action="{{ url('/comunidades/create') }}" enctype="multipart/form-data"> 
		@csrf
			@include('comunidades.form-create')
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
			<a href="{{ url('/comunidades') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
		</form>
	</div>
</div>

@endsection