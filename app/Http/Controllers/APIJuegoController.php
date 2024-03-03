<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juego;

class APIJuegoController extends Controller
{
    /**
 * Listado de los juegos
 * @OA\Get (
 *     path="/juegos",
 *     tags={"Juegos"},
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
 *                         property="titulo",
 *                         type="string",
 *                         example="Super Mario Bros."
 *                     ),
 *                     @OA\Property(
 *                         property="descripcion",
 *                         type="string",
 *                         example="Un clásico de Nintendo"
 *                     ),
 *                     @OA\Property(
 *                         property="precio",
 *                         type="number",
 *                         format="float",
 *                         example=19.99
 *                     ),
 *                     @OA\Property(
 *                         property="id_desarrollador",
 *                         type="number",
 *                         example=1
 *                     ),
 *                     @OA\Property(
 *                         property="categorias",
 *                         type="array",
 *                         @OA\Items(
 *                             type="object",
 *                             @OA\Property(
 *                                 property="id",
 *                                 type="number",
 *                                 example="1"
 *                             ),
 *                             @OA\Property(
 *                                 property="nombre",
 *                                 type="string",
 *                                 example="Acción"
 *                             ),
 *                             @OA\Property(
 *                                 property="descripcion",
 *                                 type="string",
 *                                 example="Juegos de acción"
 *                             )
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     )
 * )
 */

    public function index()
    {
        $juegos = Juego::orderBy('id', 'asc')->get();

        foreach ($juegos as $juego) {
            $juego->desarrollador->toJson();
            $juego->desarrollador->setHidden(['created_at', 'updated_at']);
        }

        foreach ($juegos as $juego) {
            $juego->categorias->toJson();
            $juego->categorias->setHidden(['created_at', 'updated_at']);
        }

        $juegos->setHidden(['created_at', 'updated_at']);
        return response()->json($juegos);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
 * Mostrar la información de un juego
 * @OA\Get (
 *     path="/juegos/{id}",
 *     tags={"Juegos"},
 *     @OA\Parameter(
 *         in="path",
 *         name="id",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="titulo", type="string", example="Super Mario Bros."),
 *             @OA\Property(property="descripcion", type="string", example="Un juego clásico de plataformas"),
 *             @OA\Property(property="precio", type="number", example=19.99),
 *             @OA\Property(property="id_desarrollador", type="integer", example=1),
 *             @OA\Property(
 *                 property="categorias",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="id",
 *                         type="integer",
 *                         example="1"
 *                     ),
 *                     @OA\Property(
 *                         property="nombre",
 *                         type="string",
 *                         example="Aventuras"
 *                     ),
 *                     @OA\Property(
 *                         property="descripcion",
 *                         type="string",
 *                         example="Juegos de aventuras"
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="El juego no existe",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="El juego no existe"),
 *         )
 *     )
 * )
 */

    public function show(string $id)
    {
        $juego = Juego::find($id);
        if(!$juego){
            return response()->json(['message' => 'El juego no existe'], 404);
        }
        
        $juego->desarrollador->toJson();
        $juego->desarrollador->setHidden(['created_at', 'updated_at']);

        $juego->categorias->toJson();
        $juego->categorias->setHidden(['created_at', 'updated_at']);
        
        $juego->setHidden(['created_at', 'updated_at']);
        return response()->json($juego);
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
