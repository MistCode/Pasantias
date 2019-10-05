@extends('layouts.app')

@section('title','Editar')

@section('content')
<div class="card shadow border border-warning" style="margin-top: 30px;">
	<div class="container">
	@include('common.errors')
		<form class="form-group" method="POST" action="{{ url('/comunidades/'.$dat->slug) }}" enctype="multipart/form-data">
				@method('PUT')
				@csrf
			<div class="row">
				<img style="height: 230px; width: 150px; margin-top: 10px; margin-right: 20px; margin-left: 30px;" src="{{asset('images/comun/'.$dat->avatar) }}" class="card-img-top rounded-circle d-block border border-primary" alt="">
					<div class="data">
						@include('comunidades.form-edit')
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</button>
							<a href="{{ url('/comunidades/'.$dat->slug) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Regresar</a>
					</div>
			</div>
		</form>
	</div>
</div>
@endsection