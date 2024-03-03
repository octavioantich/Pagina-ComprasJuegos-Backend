<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desarrollador;

class APIDesarrolladorController extends Controller
{
    /**
 * Listado de los desarrolladores
 *
 * @OA\Get (
 *     path="/desarrolladores",
 *     tags={"Desarrolladores"},
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
 *                         example="Ubisoft"
 *                     ),
 *                     @OA\Property(
 *                         property="descripcion",
 *                         type="string",
 *                         example="Desarrollador de videojuegos"
 *                     ),
 *                     @OA\Property(
 *                         property="pais",
 *                         type="string",
 *                         example="Francia"
 *                     )
 *                 )
 *             )
 *         )
 *     )
 * )
 */
    public function index()
    {
        $desarrolladores = Desarrollador::all();

        foreach($desarrolladores as $desarrollador){
            $desarrollador->juegosDesarrollados->toJson();
            $desarrollador->juegosDesarrollados->setHidden(['created_at', 'updated_at']);
        }
         $desarrolladores->setHidden(['created_at', 'updated_at']);
        return response()->json($desarrolladores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
 * Mostrar la información de un desarrollador
 * @OA\Get (
 *     path="/desarrolladores/{id}",
 *     tags={"Desarrolladores"},
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
 *              @OA\Property(property="nombre", type="string", example="Desarrollador A"),
 *              @OA\Property(property="descripcion", type="string", example="Descripcion del Desarrollador A"),
 *              @OA\Property(property="pais", type="string", example="País A")
 *         )
 *     ),
 *      @OA\Response(
 *          response=404,
 *          description="El desarrollador no existe",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="El desarrollador no existe"),
 *          )
 *      )
 * )
 */

    public function show(string $id)
    {
        $desarrollador = Desarrollador::find($id);
        if(!$desarrollador){
            return response()->json(['message' => 'El desarrollador no existe'], 404);
        }
        $desarrollador->juegosDesarrollados->toJson();
        $desarrollador->juegosDesarrollados->setHidden(['created_at', 'updated_at']);
        $desarrollador->setHidden(['created_at', 'updated_at']);
        return response()->json($desarrollador);
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
