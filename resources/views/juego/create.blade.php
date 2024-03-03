@extends('layouts.plantillaBase')

@section('contenido')

<title>Juegos</title>

<h1 style="color:blue; text-align:center;"> Juegos </h1>

<h2>CREAR JUEGO</h2>

<form action="/juegos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input id="titulo" name="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" tabindex="1">
        @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" tabindex="2">
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="imagenUrl" class="form-label">Imagen</label>
        <input id="imagenUrl" name="imagenUrl" type="file" class="form-control @error('imagenUrl') is-invalid @enderror" tabindex="3">
        @error('imagenUrl')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" class="form-control @error('precio') is-invalid @enderror" tabindex="4">
        @error('precio')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="desarrollador" class="form-label">Desarrollador</label>
        <select class="form-control @error('desarrollador') is-invalid @enderror" id="desarrollador" name="desarrollador" tabindex="5">
            @foreach ($desarrolladores as $desarrollador)
                <option value="{{ $desarrollador->id }}">
                    {{ $desarrollador->nombre }}
                </option>
            @endforeach
        </select>
        @error('desarrollador')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Categorias</label>
        @foreach ($categorias as $categoria)
            <div class="form-check">
                <input class="form-check-input @error('categorias') is-invalid @enderror" type="checkbox" name="categorias[]" value="{{ $categoria->id }}">
                <label class="form-check-label">
                    {{ $categoria->nombre }}
                </label>
            </div>
        @endforeach
        <span class="text-danger">@error('categorias') {{ $message }} @enderror</span>
        <span class="text-muted">Seleccione al menos una categoría</span>
    </div>

    <a href="/juegos" class="btn btn-secondary" tabindex="7">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
</form>


@endsection