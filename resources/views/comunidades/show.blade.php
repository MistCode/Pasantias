@extends('layouts.app')
@section('title','Mostrando Información')
@section('content')
	<div class="row">
		<ul>
			<div class="card text-center bg-white rounded border border-info" style="width: 18rem; margin-right: 20px; margin-top: 30px;">
					
				<img style="height: 150px; width: 100px; background-color: #EFEFEF; margin-top: 5px;" src="{{asset('images/comun/'.$dat->avatar) }}" class="card-img-top mx-auto d-block border border-primary" alt="">

				<div class="card-body">

				    <h5 class="card-title"> {{ $dat->name }} </h5>
				    <p class="card-text">{{ $dat->describir }}</p>
					<form class="form-group" method="POST" action="{{ url('/comunidades/'.$dat->id) }}" enctype="multipart/form-data">
						@method('DELETE')
						@csrf
						<a href="{{ url('/comunidades/'.$dat->slug.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
					</form>
				</div>
			</div>
		</ul>

		<ul>
			<div style="width: 45rem;">
				
			</div>
		</ul>	
	</div>

	

@endsection