@extends('layouts.plantillaBase')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->

<title>Categorias</title>

<h1 style="color:blue; text-align:center;"> Categorias </h1>

<a href="categorias/create" class="btn btn-primary">CREAR</a>
<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($categorias as $categoria)
    <tr>
        <td>{{$categoria->id}}</td>
        <td>{{$categoria->nombre}}</td>
        <td>{{$categoria->descripcion}}</td>
        <td>
         <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
          <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-primary">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

{{ $categorias->links() }}

@endsection