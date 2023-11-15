@extends('layouts.app')

@section('contenido')
<div class="container">
    <h1>Editar Plato</h1>
    <form action="{{ route('platos.update', ['plato' => $plato->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $plato->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            @if($plato->imagen)
                <img src="{{ Storage::url($plato->imagen) }}" width="100" />
            @endif
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $plato->descripcion }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Plato</button>
    </form>
</div>
@endsection