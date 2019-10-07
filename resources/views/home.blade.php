@extends('layouts.App')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="card-header bg-transparent border-primary text-center">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h4>
                        Bienvenido, entraste!
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
