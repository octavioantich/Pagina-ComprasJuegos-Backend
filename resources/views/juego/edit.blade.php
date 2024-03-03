@extends('layouts.plantillaBase')

@section('contenido')

<title>Juegos</title>

<h1 style="color:blue; text-align:center;"> Juegos </h1>

<h2>EDITAR JUEGO</h2>

<form action="/juegos/{{$juego->id}}" method="POST" enctype="multipart/form-data">
    @csrf    
    @method('PUT')
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input id="titulo" name="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" value="{{$juego->titulo}}">
        @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" value="{{$juego->descripcion}}">
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
    <label for="imagenUrl" class="form-label">Imagen</label>
    <input id="imagenUrl" name="imagenUrl" type="file" class="form-control @error('imagenUrl') is-invalid @enderror" onchange="showMessage(this)">
    <div id="message" class="text-muted">No se ha seleccionado ninguna imagen. La imagen que estaba antes se mantendrá.</div>
    @error('imagenUrl')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" class="form-control @error('precio') is-invalid @enderror" value="{{$juego->precio}}">
        @error('precio')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="desarrollador">Desarrollador</label>
        <select class="form-control @error('desarrollador') is-invalid @enderror" id="desarrollador" name="desarrollador">
            @foreach ($desarrolladores as $desarrollador)
                <option value="{{ $desarrollador->id }}"
                    {{ $juego->desarrollador->id == $desarrollador->id ? 'selected' : '' }}>
                    {{ $desarrollador->nombre }}
                </option>
            @endforeach
        </select>
        @error('desarrollador')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


  <div class="mb-3">
    <label for="" class="form-label">Categorias</label>
    @foreach ($categorias as $categoria)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="categorias[]" value="{{ $categoria->id }}"
            @if ($categoriasJuego->contains($categoria->id)) checked @endif>
        <label class="form-check-label">
            {{ $categoria->nombre }}
        </label>
    </div>
  @endforeach
  <span class="text-danger">@error('categorias') {{ $message }} @enderror</span>
    <span class="text-muted">Seleccione al menos una categoría</span>
</div>

  <a href="/juegos" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>

  
</form>


<script>
    function showMessage(input) {
        var message = document.getElementById('message');
        if (input.value) {
            message.style.display = 'none';
        } else {
            message.style.display = 'block';
        }
    }
</script>

@endsection
