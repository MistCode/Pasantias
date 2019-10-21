@extends('layouts.App')

@section('title', 'Comunidades')

@section('content')
@include('common.success')

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<table id="myTable" class="table table-hover bg-white text-center shadow" style="margin-top: 10px;">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Comunidades</th>
			      <th colspan="1">&nbsp;</th>
			      <th scope="col">Todos</th>
			      <th colspan="1">&nbsp;</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<div class="row">
				@foreach($usuarios as $dat)  	
				    <tr>
				      <th scope="row"><img style="height: 100px; width: 75px; background-color: #6574cd; margin-top: 5px;" src="images/comun/{{ $dat->avatar }}" class="card-img rounded mx-auto d-block border border-primary" alt=""></th>

				      <td>{{ $dat->name }}</td>
				      <td>{{ $dat->describir }}</td>
				      <td>
				      	@can('comunidades.show')
				      		<a href="{{ url('/comunidades', $dat["slug"]) }}" class="btn btn-primary">Ver <i class="fas fa-plus-circle"></i></a>
				      	@endcan
				      </td>
				    </tr>
				@endforeach 
				</div>   
			  </tbody>
			</table>
		</div>
		<div class="col-sm-4">
			<div class="card border-primary text-primary shadow" style="margin-top: 10px;">
			  <div class="card-body">
			    <h5 class="card-title text-center">Comunidad</h5>
			    <p class="card-text">Aqui se Encuentra toda la información dada por los encargados, de tal manera para que aquellos necesitan compartirla, volver a verlo, o para aquellos que no esten alli en ese momento se informen.</p>
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection