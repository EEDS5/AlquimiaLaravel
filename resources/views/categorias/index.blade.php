{{-- resources/views/categorias/index.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear Nueva Categoría</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ route('categorias.destroy', $categoria) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
