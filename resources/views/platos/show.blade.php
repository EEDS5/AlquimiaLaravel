@extends('layouts.app')

@section('contenido')
<div class="container">
    <h1>Detalles del Plato</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $plato->nombre }}</h5>
            <p class="card-text">{{ $plato->descripcion }}</p>
            <p class="card-text">{{ $plato->estado ? 'Activo' : 'Inactivo' }}</p>
            @if($plato->imagen)
                <img src="{{ Storage::url($plato->imagen) }}" width="100" alt="Imagen del plato">
            @endif
            <a href="{{ route('platos.edit', $plato->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection