@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card con sombra y bordes redondeados -->
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center py-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <!-- Título más grande y centrado -->
                    <h3 class="font-weight-bold">{{ __('Dashboard') }}</h3>
                </div>

                <!-- Contenido de la tarjeta -->
                <div class="card-body bg-light p-5">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Mensaje de bienvenida -->
                    <div class="text-center">
                        <h5 class="text-muted mb-3">{{ __('Welcome back,') }}</h5>
                        <p class="lead">{{ __('You are logged in!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

