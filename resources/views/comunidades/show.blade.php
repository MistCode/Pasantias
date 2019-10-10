@extends('layouts.App')
@section('title','Mostrando Información')
@section('content')
@include('common.success')
	<div class="row">
		<ul>
			<div class="card text-center bg-white rounded border-info" style="width: 18rem; margin-right: 20px; margin-top: 30px;">
					
				<img style="height: 150px; width: 100px; background-color: #EFEFEF; margin-top: 5px;" src="{{asset('images/comun/'.$dat->avatar) }}" class="card-img-top mx-auto d-block border border-primary" alt="">

				<div class="card-body">

				    <h5 class="card-title"> {{ $dat->name }} </h5>
				    <p class="card-text">{{ $dat->describir }}</p>
					<form class="form-group" method="POST" action="{{ url('/comunidades/'.$dat->id) }}" enctype="multipart/form-data">
						@method('DELETE')
						@csrf
						@can('comunidades.edit')
							<a href="{{ url('/comunidades/'.$dat->slug.'/edit')}}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
						@endcan
						@can('comunidades.destroy')
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
						@endcan
					</form>
				</div>
			</div>
		</ul>
		<ul>
			<div style="width: 45rem;">
				<boton></boton>
				<formulario></formulario>
				<listando></listando>
			</div>
		</ul>
	</div>

	

@endsection