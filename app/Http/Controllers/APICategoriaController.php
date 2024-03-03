<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
/**
* @OA\Info(
*             title="Taco gaming", 
*             version="1.0",
*             description="Apis"
* )
*
* @OA\Server(url="https://code-connoisseurs-laravel.vercel.app")
*/
class APICategoriaController extends Controller
{
    /**
     * Listado de las categorias de los juegos
     * @OA\Get (
     *     path="/categorias",
     *     tags={"Categorias"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="nombre",
     *                         type="string",
     *                         example="Aderson Felix"
     *                     ),
     *                     @OA\Property(
     *                         property="descripcion",
     *                         type="string",
     *                         example="Jara Lazaro"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */    

    public function index()
    {
        $categorias = Categoria::all();

        foreach($categorias as $categoria){
            $categoria->juegos->toJson();
            $categoria->juegos->setHidden(['created_at', 'updated_at']);
        }
         $categorias->setHidden(['created_at', 'updated_at']);
        return response()->json($categorias);
    }

    
    public function store(Request $request)
    {
        //
    }

    /**
     * Mostrar la información de una categoria
     * @OA\Get (
     *     path="/categorias/{id}",
     *     tags={"Categorias"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="nombre", type="string", example="Aderson Felix"),
     *              @OA\Property(property="descripcion", type="string", example="Jara Lazaro"),
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="La categoria no existe",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="La categoria no existe"),
     *          )
     *      )
     * )
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        if(!$categoria){
            return response()->json(['message' => 'La categoria no existe'], 404);
        }
        $categoria->juegos->toJson();
        $categoria->juegos->setHidden(['created_at', 'updated_at']);
        $categoria->setHidden(['created_at', 'updated_at']);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
