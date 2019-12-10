@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="margin-top: 60px !important;">
            <div class="card" style="background: #000; border: thin solid #fff; color: #FFF">
                <img src="{{ asset('images/festipizza.png') }}" alt=""
                     style="position: absolute; width: 150px; left: 0; right:0; top: -70px; margin-left: auto; margin-right: auto; z-index: 1" />
                <div class="card-header" style="text-align: center; margin-top: 70px; margin-bottom: 0;"><h3>Registrate</h3></div>

                <div class="card-body" style="margin-top: 0px">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" >Nombre completo</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">
                            <label for="email" >{{ __('E-Mail') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label for="password" >{{ __('Contraseña') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group ">
                            <label for="password-confirm" >{{ __('Confirma contraseña') }}</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrarme') }}
                                </button>
                                <br>
                                <a href="{{ route('login') }}" style="display: block; text-align: center">Ya tienes cuenta?, Inicia Sesion!</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
