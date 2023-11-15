{{-- resources/views/tipoPlatos/create.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <h1>Crear Tipo de Plato</h1>

    <form method="POST" action="{{ route('tipoPlatos.store') }}">
        @csrf

        <label for="nombre">Nombre del Tipo de Plato:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" rows="4"></textarea><br><br>

        <label for="estado">Estado:</label>
        <input type="hidden" name="estado" value="0"> <!-- Valor predeterminado -->
        <input type="checkbox" name="estado" value="1"> <!-- Marcado -->

        <input type="submit" value="Crear Tipo de Plato">
    </form>
@endsection
