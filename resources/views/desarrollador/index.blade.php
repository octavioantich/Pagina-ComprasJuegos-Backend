@extends('layouts.plantillaBase')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->

<title>Desarrolladores</title>

<h1 style="color:blue; text-align:center;"> Desarrolladores </h1>

<a href="desarrolladores/create" class="btn btn-primary">CREAR</a>
<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Pais</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($desarrolladores as $desarrollador)
    <tr>
        <td>{{$desarrollador->id}}</td>
        <td>{{$desarrollador->nombre}}</td>
        <td>{{$desarrollador->descripcion}}</td>
        <td>{{$desarrollador->pais}}</td>
        <td>
         <form action="{{ route('desarrolladores.destroy',$desarrollador->id) }}" method="POST">
          <a href="/desarrolladores/{{$desarrollador->id}}/edit" class="btn btn-primary">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

{{ $desarrolladores->links() }}


@endsection