@extends('layouts.app')


@section('content')
<div class="blur-oval-background"></div>
<div class="blur-oval-background-center"></div>
<div class="blur-oval-background-right"></div>
<script src="{{ asset('js/alternar-tema-L-R.js') }}"></script>
<!-- <link rel="stylesheet" href="{{ asset('css/styleLR-dark.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset('css/styleLR-light.css') }}"> -->
<!-- <script src="{{ asset('js/altenar-tema-L-R.js') }}"></script> -->
<div class="d-flex justify-content-between w-100">
    <!-- <a href="{{ url('/') }}" class="btn d-flex align-items-center justify-content-center" 
        style="background-color: #121212; width: 50px; height: 50px; border-radius: 50%;">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
        </svg>
    </a> -->
    <a href="#" id="themeToggle" class="btn d-flex align-items-center justify-content-center" 
        style="background-color: #121212; width: 50px; height: 50px; border-radius: 50%;">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-brightness-low" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8m.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707m7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707M3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707"/>
        </svg>
    </a>
    <a href="{{ url('/') }}" class="btn d-flex align-items-center justify-content-center" 
        style="background-color: #121212; width: 50px; height: 50px; border-radius: 50%;">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
        </svg>
    </a>
</div>




<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center"> <!-- Cambié el col-md-6 por col-md-12 para que ocupen todo el ancho -->
                        <!-- Botón Crear Cuenta -->
                        <a href="{{ route('register') }}" class="btn btn-custom-1" role="button">
                            {{ __('SIGN UP') }}
                        </a>
                        
                        <!-- Botón Iniciar Sesión -->
                        <a href="{{ route('login') }}" class="btn btn-custom-2" role="button">
                            {{ __('LOGIN') }}
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
                            {{ __('Registrarce con Google') }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-browser-chrome me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M16 8a8 8 0 0 1-7.022 7.94l1.902-7.098a3 3 0 0 0 .05-1.492A3 3 0 0 0 10.237 6h5.511A8 8 0 0 1 16 8M0 8a8 8 0 0 0 7.927 8l1.426-5.321a3 3 0 0 1-.723.255 3 3 0 0 1-1.743-.147 3 3 0 0 1-1.043-.7L.633 4.876A8 8 0 0 0 0 8m5.004-.167L1.108 3.936A8.003 8.003 0 0 1 15.418 5H8.066a3 3 0 0 0-1.252.243 2.99 2.99 0 0 0-1.81 2.59M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            </svg>
                        </a>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="col-form-label">{{ __('Last Name') }}</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate" class="col-form-label">{{ __('Birthdate') }}</label>
                    <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required>
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>


                <div class="form-group row mb-0 justify-content-center">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary1">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="terms">
                            <a href="{{ url('/terminos-y-condiciones') }}" target="_blank" class="text-muted" style="font-size: 10px;">Acepto los Términos y Condiciones</a>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- </div> -->
@endsection
