{{-- resources/views/categorias/edit.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <h1>Editar Categoría</h1>

    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @csrf
        @method('PUT')

        <label for="descripcion">Descripción de la Categoría:</label>
        <input type="text" name="descripcion" value="{{ $categoria->descripcion }}" required><br><br>

        <label for="estado">Estado:</label>
        <input type="hidden" name="estado" value="0" {{ $categoria->estado ? 'checked' : '' }}>
        <input type="checkbox" name="estado" value="1" {{ $categoria->estado ? 'checked' : '' }}><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>
@endsection
