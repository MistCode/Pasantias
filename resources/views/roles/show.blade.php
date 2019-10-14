@extends('layouts.App')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-primary" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="card-heading btn btn-info">Rol</div>

                <div class="card-body">                                        
                    <p><strong>Nombre</strong>     {{ $role->name }}</p>
                    <p><strong>Slug</strong>       {{ $role->slug }}</p>
                    <p><strong>Descripción</strong>  {{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection