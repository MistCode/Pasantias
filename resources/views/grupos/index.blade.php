@extends('layouts.app')

@section('title','Mis Grupos')

@section('content')

@include('common.success')

	<div class="container">
		
		<div class=" col-sm text-center">
			<h1 style="margin-top: 10px;"><span class="border-bottom">Grupos</span></h1>
		</div>
	</div>

	<div class="row">
		@foreach($usuarios as $ingresar)
			<div class="col-sm">
				<div class="card border-primary p-3 mb-5 text-center shadow" style="width: 18rem; margin-right: 40px; margin-top: 30px;">
					
					<img style="height: 200px; width: 150px; margin-top: 5px;" src="images/{{ $ingresar->avatar }}" class="card-img-top mx-auto d-block" alt="">

					<div class="card-body">

					    <h5 class="card-title"> {{ $ingresar->name }} </h5>
					    <p class="card-text">{{ $ingresar->descript }}</p>
					    <a href="{{ url('/grupos', $ingresar["slug"]) }}" class="btn btn-outline-primary">Ver Más Info <i class="fas fa-plus-circle"></i></a>

					</div>
				</div>
			</div>
			
		@endforeach	
	</div>
@endsection