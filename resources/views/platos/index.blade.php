@extends('layouts.app')

@section('contenido')
<div class="container">
    <h1>Listado de Platos</h1>
    <a href="{{ route('platos.create') }}" class="btn btn-primary mb-2">Añadir Plato</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($platos as $plato)
                <tr>
                    <td>{{ $plato->nombre }}</td>
                    <td><img src="{{ Storage::url($plato->imagen) }}" width="100" /></td>
                    <td>{{ $plato->descripcion }}</td>
                    <td>
                        <a href="{{ route('platos.edit',  $plato->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('platos.destroy',  $plato->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection