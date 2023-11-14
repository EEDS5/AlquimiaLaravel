@extends('layouts.app')

@section('titulo', 'Login de usuario')

@section('contenido')
<form action="{{ route('login') }}" method="POST" novalidate>
    @csrf
    @if(session('mensaje'))
        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
    @endif

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input 
            id="username"
            name="username"
            type="text"
            placeholder="Ingresa tu username de registro"
            class="form-control @error('username') is-invalid @enderror"
            value="{{ old('username') }}"
        />
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="contraseña" class="form-label">Password</label>
        <input 
            id="contraseña"
            name="contraseña"
            type="password"
            placeholder="Ingresa tu contraseña"
            class="form-control @error('contraseña') is-invalid @enderror"
        />
        @error('contraseña')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Mantener mi sesión</label>
    </div>

    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</form>
@endsection