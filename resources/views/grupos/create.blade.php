@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')

<div class="card shadow border border-warning p-5 mb-5" style="margin-top: 30px; width: 50rem; margin-left: 200px;">
	<div class="container">
		<div class=" col-sm text-center">
			<h2 style="margin-top: 10px;"><span class="border-bottom">Crear Grupo</span></h2>
		</div>
	</div>

@include('common.errors')
	<div class="row" style="margin-top: 2rem;">
		<div class="text-center"></div>
			<form class="form-group" method="POST" action="{{ url('/grupos/create') }}" enctype="multipart/form-data"> 
			@csrf
				@include('grupos.form-create')
				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
				<a href="{{ url('/grupos') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
			</form>
	</div>
</div>
@endsection