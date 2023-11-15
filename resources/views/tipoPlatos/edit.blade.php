{{-- resources/views/tipoPlatos/edit.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <h1>Editar Tipo de Plato</h1>

    <form method="POST" action="{{ route('tipoPlatos.update', $tipoPlato) }}">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del Tipo de Plato:</label>
        <input type="text" name="nombre" value="{{ $tipoPlato->nombre }}" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion">{{ $tipoPlato->descripcion }}</textarea><br><br>

        <label for="estado">Estado:</label>
        <input type="hidden" name="estado" value="0" {{ $tipoPlato->estado ? 'checked' : '' }}>
        <input type="checkbox" name="estado" value="1" {{ $tipoPlato->estado ? 'checked' : '' }}><br><br>

        <input type="submit" value="Guardar">
    </form>
@endsection