@extends('layouts.app')

@section('content')
<div class="blur-oval-background-L"></div>
<div class="blur-oval-background-center-L"></div>
<div class="blur-oval-background-right-L"></div>
<!-- <link rel="stylesheet" href="{{ asset('css/StyleLR-dark.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset('css/styleLR-light.css') }}"> -->


<div class="d-flex justify-content-between w-100">
    <button id="toggle" >
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
        </svg>
    </button>
    
    <a href="{{ url('/') }}" class="botonX  d-flex align-items-center justify-content-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
        </svg>
    </a>
</div>



<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center"> <!-- Cambié el col-md-6 por col-md-12 para que ocupen todo el ancho -->
                        <!-- Botón Crear Cuenta -->
                        <a href="{{ route('register') }}" class="btn btn-custom-1" role="button">
                            {{ __('REGISTRARSE') }}
                        </a>
                        
                        <!-- Botón Iniciar Sesión -->
                        <a href="{{ route('login') }}" class="btn btn-custom-2" role="button">
                            {{ __('INICIAR SESION') }}
                        </a>
                    </div>
                </div>
                <div class ="logito">
                    <img src="{{ asset('Imagenes/Logo.png') }}" alt="error" id ="logo">
                </div>
                <h2 class="text-center">MyReport</h2>
                <div class="form-group row mb-0">
                <div class="col-md-12 d-flex justify-content-center">
                    <!-- Botón I registrace con Google -->
                    <a href="{{ url('/auth/google') }}" class="btn btn-primary btn-google-login d-flex align-items-center">
                        {{ __('Inicia sesion con Google') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-browser-chrome me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M16 8a8 8 0 0 1-7.022 7.94l1.902-7.098a3 3 0 0 0 .05-1.492A3 3 0 0 0 10.237 6h5.511A8 8 0 0 1 16 8M0 8a8 8 0 0 0 7.927 8l1.426-5.321a3 3 0 0 1-.723.255 3 3 0 0 1-1.743-.147 3 3 0 0 1-1.043-.7L.633 4.876A8 8 0 0 0 0 8m5.004-.167L1.108 3.936A8.003 8.003 0 0 1 15.418 5H8.066a3 3 0 0 0-1.252.243 2.99 2.99 0 0 0-1.81 2.59M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                        </svg>
                    </a>
                </div>
                </div>
                
            
                <div class="form-group ">
                    <label for="email" class="col-form-label">{{ __('Correo electronico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group row justify-content-center">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary1">
                            {{ __('Login') }}
                        </button>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="col-md-12 text-center mt-2"> 
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </form>
    </div>
</div>

@endsection
