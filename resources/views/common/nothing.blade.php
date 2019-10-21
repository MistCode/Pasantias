@extends('layouts.App')

@section('title','Grupos')

@section('content')

@include('common.success')

	<div class="container">
		<div class="card col-md-8 offset-md-2 text-center shadow bg-white border-info" style="margin-top: 140px; margin-bottom: 20px;">
			<div class="row no-gutters">
    			<div class="col-md-4">
      				<img src="{{ asset('images/grupos-imagen.jpg') }}" class="card-img" alt="..." style="margin-top: 30px;">
    			</div>
    				<div class="col-md">
						<div class="card-body">
							<br><h1>No Hay Grupos Creados</h1>
							<h1>Empieza a <a href="{{ url('/grupos/create') }}">Añadirlos</a></h1>
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection