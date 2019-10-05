@extends('layouts.app')

@section('title','Editar')

@section('content')

<div class="card shadow border border-warning p-5 mb-5" style="margin-top: 30px; width: 70rem;">
	<div class="container">
		<div class=" col-sm text-center">
			<h2 style="margin-top: 10px;"><span class="border-bottom">Editar Información de {{ $mostrar->slug }}</span></h2>
		</div>
	</div>

@include('common.errors')
	<form class="form-group" method="POST" action="{{ url('/grupos/'.$mostrar->slug) }}" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="row">
			<img style="height: 230px; width: 150px; margin-top: 40px; margin-right: 20px;" src="{{asset('images/'.$mostrar->avatar) }}" class="card-img-top rounded-circle d-block border border-primary" alt="">
			<div class="data">
				<div class="container">
					@include('grupos.form-edit')
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</button>
					<a href="{{ url('/grupos/'.$mostrar->slug) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
				</div>
			</div>
		</div>
	</form>

</div>
@endsection