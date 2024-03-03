@extends('layouts.plantillaBase')

@section('contenido')

<title>Desarrolladores</title>

<h1 style="color:blue; text-align:center;"> Desarrolladores </h1>

<h2>CREAR DESARROLLADOR</h2>

<form action="/desarrolladores" method="POST">
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
    <div class="mb-3">
        <label for="pais" class="form-label">Pais</label>
        <input id="pais" name="pais" type="text" class="form-control @error('pais') is-invalid @enderror" tabindex="3">
        @error('pais')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <a href="/desarrolladores" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>


@endsection