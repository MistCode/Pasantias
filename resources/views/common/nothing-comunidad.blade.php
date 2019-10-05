@extends('layouts.app')

@section('title','Comunidades')

@section('content')

@include('common.success')

	<div class="container">
		<div class="card text-center shadow bg-white rounded border border-info" style=" margin-left: 100px; margin-top: 140px;">
			<div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{ asset('images/comunidad-imagen.jpg') }}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
		<div class="card-body">
			<br><h1>No Hay Comunidades Creadas</h1>
			<h1>Empieza a <a href="{{ url('/comunidades/create') }}">Añadirlos</a></h1>
		</div>
		</div>
		</div>
	</div>
@endsection