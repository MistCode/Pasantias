@extends('layouts.App')
@section('title','Editar Usuario')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-primary" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="card-heading btn btn-info">Roles</div>

                <div class="card-body">                    
                    {!! Form::model($user, ['route' => ['users.update', $user->id],
                    'method' => 'PUT']) !!}

                        @include('users.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection