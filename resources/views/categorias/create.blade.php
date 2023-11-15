{{-- resources/views/categorias/create.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <h1>Crear Categoría</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf

        <label for="descripcion">Descripción de la Categoría:</label>
        <input type="text" name="descripcion" required><br><br>

        <label for="estado">Estado:</label>
        <input type="hidden" name="estado" value="0"> <!-- Valor predeterminado -->
        <input type="checkbox" name="estado" value="1"> <!-- Marcado -->

        <input type="submit" value="Crear Categoría">
    </form>
@endsection
