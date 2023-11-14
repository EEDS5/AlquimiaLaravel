@extends('layouts.app')

@section('titulo', 'Registro de usuario')

@section('contenido')
<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-5 p-5 d-flex align-items-center">
            <img src="{{ asset('img/cocinero.jpg') }}" alt="imagen login de usuario" class="img-fluid mx-auto d-block">
        </div>
        <div class="col-md-7 bg-white p-5 rounded-lg shadow">
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control rounded-pill @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Ingresa tu nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellido_p" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control rounded-pill @error('apellido_p') is-invalid @enderror" id="apellido_p" name="apellido_p" placeholder="Ingresa tu apellido paterno" value="{{ old('apellido_p') }}">
                    @error('apellido_p')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellido_m" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control rounded-pill @error('apellido_m') is-invalid @enderror" id="apellido_m" name="apellido_m" placeholder="Ingresa tu apellido materno" value="{{ old('apellido_m') }}">
                    @error('apellido_m')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ci" class="form-label">Ci</label>
                    <input type="text" class="form-control rounded-pill @error('ci') is-invalid @enderror" id="ci" name="ci" placeholder="Ingresa tu CI" value="{{ old('ci') }}">
                    @error('ci')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">telefono</label>
                    <input type="text" class="form-control rounded-pill @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Ingresa tu Telefono" value="{{ old('telefono') }}">
                    @error('telefono')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control rounded-pill @error('ci') is-invalid @enderror" id="direccion" name="direccion" placeholder="Ingresa tu Direccion de vivendia" value="{{ old('direccion') }}">
                    @error('direccion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingresa tu email de registro" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
                <div class="mb-3">
                    <label for="razon_social" class="form-label">Razon Social</label>
                    <input type="razon_social" class="form-control rounded-pill @error('razon_social') is-invalid @enderror" id="razon_social" name="razon_social" placeholder="Ingresa razon social" value="{{ old('razon_social') }}">
                    @error('razon_social')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
                <div class="mb-3">
                    <label for="nit" class="form-label">nit</label>
                    <input type="nit" class="form-control rounded-pill @error('nit') is-invalid @enderror" id="nit" name="nit" placeholder="Ingresa tu nit" value="{{ old('nit') }}">
                    @error('nit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control rounded-pill @error('username') is-invalid @enderror" id="username" name="username" placeholder="Ingresa tu nombre de usuario" value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingresa tu contraseña">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Password</label>
                    <input type="password" class="form-control rounded-pill" id="password_confirmation" name="password_confirmation" placeholder="Confirma tu contraseña">
                </div>
                <button type="submit" class="btn btn-primary rounded-pill">Crear cuenta</button>
            </form>
        </div>
    </div>
</div>
@endsection