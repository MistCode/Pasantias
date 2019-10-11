@extends('layouts.App')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card border-primary" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="card-heading btn btn-info">Usuario</div>

                <div class="card-body">                                        
                    <p><strong>Nombre</strong>     {{ $user->name }}</p>
                    <p><strong>Email</strong>      {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection