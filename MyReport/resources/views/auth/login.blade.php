@extends('layouts.app')

@section('content')
<div class="blur-oval-background-L"></div>
<div class="blur-oval-background-center-L"></div>
<div class="blur-oval-background-right-L"></div>

<div class="container">
    <div class="d-flex justify-content-between w-100">
        <a href="{{ url('/') }}" class="btn d-flex align-items-center justify-content-center" 
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
                <form method="POST" action="{{ route('login') }}">
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
                    
                    <!-- <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-6">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->



                    <div class="d-flex justify-content-center">
                        <div class="w-50"> <    
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="email" class="col-form-label text-md-center d-block">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="password" class="col-form-label text-md-center d-block">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="form-group row justify-content-center">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary1">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
