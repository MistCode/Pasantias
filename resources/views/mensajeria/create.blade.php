@extends('layouts.App')
@section('title','Mensajeria')
@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="card-header bg-transparent border-primary text-center">Mensajeria@Cacique</div>
                <form method="POST" action="{{ route('mensajeria.store') }}">
                	@csrf
                	<div class="card-body">
	                	<div class="form-group">
	                		<select name="recipient_id" class="form-control">
	                			<option value="">Selecciona un Usuario</option>
		                		@foreach ($users as $user)
		                			<option value="{{ $user->id }}">{{ $user->name }}</option>
		                		@endforeach
	                		</select>
	                	</div>
	                	<div class="form-group">
	                		<input type="text" class="form-control" id="name" name="name" placeholder="Asunto">
	                	</div>
	                	<div class="form-group">
	                		<textarea name="body" class="form-control" placeholder="Escriba su mensaje" cols="90" rows="5"></textarea>
	                	</div>
	                    <div class="form-group">
	                    	<button class="btn btn-primary bnt-block text-center">Enviar</button>
	                    </div>
	                    
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection