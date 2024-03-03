<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::paginate(50);
        return view('compra.index')->with('compras',$compras);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compra = Compra::find($id);
    }
}
