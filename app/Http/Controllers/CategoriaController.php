<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(50);
        return view('categoria.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        if($validated){
            $categorias = new Categoria();

            $categorias->nombre = $request->get('nombre');
            $categorias->descripcion = $request->get('descripcion');

            $categorias->save();
        }

        return redirect('/categorias');
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
        $categoria = Categoria::find($id);

        return view('categoria.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        if($validated){
            $categoria = Categoria::find($id);

            $categoria->nombre  =$request->get('nombre');
            $categoria->descripcion  =$request->get('descripcion');

            $categoria->save();

        }
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect('/categorias');
    }
}
