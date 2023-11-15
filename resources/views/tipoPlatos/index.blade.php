{{-- resources/views/tipoPlatos/index.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <div class="container mt-4">
        <h1>Tipos de Plato</h1>

        <!-- Botón para ir a la página de creación -->
        <a href="{{ route('tipoPlatos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Tipo de Plato</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoPlatos as $tipoPlato)
                    <tr>
                        <td>{{ $tipoPlato->nombre }}</td>
                        <td>{{ $tipoPlato->descripcion }}</td>
                        <td>{{ $tipoPlato->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('tipoPlatos.edit', $tipoPlato) }}" class="btn btn-warning">Editar</a>

                            <form method="POST" action="{{ route('tipoPlatos.destroy', $tipoPlato) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de plato?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection