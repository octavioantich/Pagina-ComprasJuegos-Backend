@extends('layouts.plantillaBase')

@section('contenido')
<!-- <div class="shadow-lg p-3 mb-5 bg-white rounded"><h3>Contenido de INDEX</h3></div> -->

<title>Compras</title>

<h1 style="color:blue; text-align:center;"> Compras </h1>

<table class="table table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Id usuario</th>
      <th scope="col">Fecha compra</th>
      <th scope="col">Juegos Comprados</th>
      <th scope="col">Precio Total</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($compras as $compra)
    <tr>
        <td>{{$compra->id}}</td>
        <td>{{$compra->idUsuario}}</td>
        <td>{{$compra->fecha_compra}}</td>
        <td>@foreach ($compra->juegosComprados as $juegoComprado)
            <li>{{ $juegoComprado->titulo }}</li>
            @endforeach</td>
        <td>{{$compra->precioTotal}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $compras->links() }}


@endsection