@extends('layouts.plantillaBase')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->

<title>Juegos</title>

<h1 style="color:blue; text-align:center;"> Juegos </h1>

<a href="juegos/create" class="btn btn-primary">CREAR</a>
<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Título</th>
      <th scope="col">Descripción</th>
      <th scope="col">Imagen</th>
      <th scope="col">Precio</th>
      <th scope="col">Desarrollador</th>
      <th scope="col">Categoría</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($juegos->chunk(100) as $chunk)
      @foreach ($chunk as $juego)
        <tr>
          <td>{{ $juego->id }}</td>
          <td>{{ $juego->titulo }}</td>
          <td>{{ $juego->descripcion }}</td>
          <td>{{ $juego->imagenUrl }}</td>
          <td>{{ $juego->precio }}</td>
          <td>{{ $juego->desarrollador->nombre }}</td>
          <td>
            @foreach ($juego->categorias as $categoria)
              <li>{{ $categoria->nombre }}</li>
            @endforeach
          </td>
          <td>
            <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST">
              <a href="/juegos/{{ $juego->id }}/edit" class="btn btn-primary">Editar</a>         
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>          
          </td>        
        </tr>
      @endforeach
    @endforeach
  </tbody>
</table>
{{ $juegos->links() }}

@endsection