@extends('layouts.plantillaBase')

@section('contenido')

<title>Categorias</title>

<h1 style="color:blue; text-align:center;"> Categorias </h1>

<h2>CREAR CATEGORIA</h2>

<form action="/categorias" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" tabindex="1">
        @error('nombre')
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
    <a href="/categorias" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>


@endsection