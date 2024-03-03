<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desarrollador;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desarrolladores = Desarrollador::paginate(50);
        return view('desarrollador.index')->with('desarrolladores',$desarrolladores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desarrollador.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'pais' => 'required|string'
        ]);

        if($validated){
            $desarrolladores = new Desarrollador();

            $desarrolladores->nombre = $request->get('nombre');
            $desarrolladores->descripcion = $request->get('descripcion');
            $desarrolladores->pais = $request->get('pais');

            $desarrolladores->save();
        }

        return redirect('/desarrolladores');
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
        $desarrollador = Desarrollador::find($id);

        return view('desarrollador.edit')->with('desarrollador',$desarrollador);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'pais' => 'required|string'
        ]);

        if($validated){
            $desarrollador = Desarrollador::find($id);

            $desarrollador->nombre = $request->get('nombre');
            $desarrollador->descripcion = $request->get('descripcion');
            $desarrollador->pais = $request->get('pais');

            $desarrollador->save();
        }

        return redirect('/desarrolladores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desarrollador = Desarrollador::find($id);
        $desarrollador->delete();

        return redirect('/desarrolladores');
    }
}
