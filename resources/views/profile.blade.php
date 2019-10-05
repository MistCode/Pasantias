@extends('layouts.app')

@section('title','Perfil')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2" style="margin-top: 70px; margin-left: 70px;">
      @include('common.errors')
      <div class="card text-center border border-warning">
        <div class="row no-gutters">
          <div class="col-md-3">
            <img width="100px" height="100px" style="margin-top: 10px; margin-left: 10px;" src="{{ asset('images/ae/'.$user->avatar) }}">
            <h2 style="margin-top: 10px; margin-left: 10px;">{{ $user->name }}</h2><br>
          </div>
            <div class="col-md-7">  
              <h2 style="margin-top: 10px; margin-bottom: 20px; margin-left: 10px;">Editar Perfil</h2>

              <form class="form-group" method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
              
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
              <div class="col-md-6">
                  <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              </div>
            </div>

            <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

            <div class="form-group row">
              <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>
              <div class="col-md-6">
                <input id="avatar" name="avatar" type="file" class="file" value="{{ old('avatar') }}" required autocomplete="avatar" autofocus>
              </div>
            </div>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Actualizar</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection