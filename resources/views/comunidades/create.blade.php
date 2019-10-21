@extends('layouts.App')
@section('title','Crear Comunidad')
@section('content')
@include('common.errors')
<div class="card col-md-6 offset-md-2 shadow border border-warning" style="margin-top: 30px;">
<div class="container">
		<div class="col-sm text-center">
			<h2 style="margin-top: 10px; margin-bottom: 10px;">
				<span class="border-bottom">Crear Comunidad</span>
			</h2>
		</div>
	</div>
	<div class="row col-md-10 offset-md-1">
		<form class="form-group" method="POST" action="{{ route('comunidades.store') }}" enctype="multipart/form-data"> 
		@csrf
			@include('comunidades.form-create')
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
			<a href="{{ url('/comunidades') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
		</form>
	</div>
</div>

@endsection