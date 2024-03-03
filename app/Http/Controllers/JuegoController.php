<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Desarrollador;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = Juego::paginate(50);
        return view('juego.index')->with('juegos',$juegos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorias = Juego::todasCategorias();
        $desarrolladores = Desarrollador::all();
        return view('juego.create', compact('categorias', 'desarrolladores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'imagenUrl' => 'required|image',
            'precio' => 'required|numeric|min:0',
            'desarrollador' => 'required',
            'categorias' => 'required|array|min:1'
        ]);

        if($validated){
            $juegos = new Juego();

            $juegos->titulo = $request->get('titulo');
            $juegos->descripcion = $request->get('descripcion');
            $juegos->precio = $request->get('precio');
            $juegos->idDesarrollador = $request->get('desarrollador');

            $image = $request->file('imagenUrl');
            $uploadedFile = $image->storeOnCloudinary('juegos');
            $juegos->imagenUrl = $uploadedFile->getSecurePath();



            $juegos->save();

            $categorias = $request->input('categorias');
            $juegos->categorias()->sync($categorias);
        }

        return redirect('/juegos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $juego = Juego::find($id);

        $categorias = Juego::todasCategorias();
        $categoriasJuego = $juego->categorias;
        $desarrolladores = Desarrollador::all();
        return view('juego.edit', compact('juego', 'categorias', 'categoriasJuego', 'desarrolladores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'desarrollador' => 'required',
            'categorias' => 'required|array|min:1'
        ]);

        if($validated){
            $juego = Juego::find($id);
        
            $juego->titulo = $request->get('titulo');
            $juego->descripcion = $request->get('descripcion');
            $juego->precio = $request->get('precio');
            $juego->idDesarrollador = $request->get('desarrollador');
            $categorias = $request->input('categorias');
            $juego->categorias()->sync($categorias);
            
            if ($request->hasFile('imagenUrl')) {
                $image = $request->file('imagenUrl');
                $uploadedFile = $image->storeOnCloudinary('juegos');
                $juego->imagenUrl = $uploadedFile->getSecurePath();
            }
            $juego->save();
        }

        return redirect('/juegos');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $juego = Juego::find($id);
        $juego->delete();

        return redirect('/juegos');
    }
}
