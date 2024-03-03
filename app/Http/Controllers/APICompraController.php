<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\JuegoComprado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class APICompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

/**
 * Realiza una nueva compra y la almacena en la base de datos.
 *
 * @OA\Post(
 *     path="/compras",
 *     tags={"Compras"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"idUsuario", "fecha_compra", "juegosComprados"},
 *             @OA\Property(property="idUsuario", type="integer", example="1", description="ID del usuario que realiza la compra."),
 *             @OA\Property(property="fecha_compra", type="string", format="date-time", example="2023-05-12 16:30:00", description="Fecha y hora en la que se realizó la compra."),
 *             @OA\Property(property="juegosComprados", type="array", @OA\Items(type="object", 
 *                 required={"idJuego", "precioDelMomento"},
 *                 @OA\Property(property="idJuego", type="integer", example="1", description="ID del juego comprado."),
 *                 @OA\Property(property="precioDelMomento", type="number", example="29.99", description="Precio del juego en el momento de la compra.")
 *             ), example="[{'idJuego': 17, 'precioDelMomento': 53.31}]", description="Lista de juegos comprados.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Compra realizada correctamente",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Compra realizada correctamente")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Errores de validación",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="array", @OA\Items(type="string"), example="['La compra no puede ser realizada correctamente']"),
 *         )
 *     )
 * )
 */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'fecha_compra' => 'required | date',
                'juegosComprados' => 'required | array | min:1',
                'juegosComprados.*.idJuego' => 'required | integer | exists:juegos,id',
                'juegosComprados.*.precioDelMomento' => 'required | numeric | min:0',
            ],
            [
                'fecha_compra.required' => 'La fecha de la compra no puede ser vacia.',
                'fecha_compra.date' => 'La fecha de la compra no tiene el formato adecuado.',   

                'juegosComprados.required' => 'Debe haber al menos un juego en la compra',    
                'juegosComprados.array' => 'Los juegos deben estar en un formato válido de arreglo',  

                'juegosComprados.*.idJuego.required' => 'El id del juego es requerido',    
                'juegosComprados.*.idJuego.integer' => 'El id del juego debe ser un número entero', 
                'juegosComprados.*.idJuego.exists' => 'No existe un juego con ese id.',

                'juegosComprados.*.precioDelMomento.required' => 'El precio del juego no puede ser vacio',    
                'juegosComprados.*.precioDelMomento.numeric' => 'El precio del juego debe ser un número',
            ]);

            if($request->user()){
                $usuario = $request->user();
                $compra = new Compra();

                $compra->idUsuario = $usuario->id;
                $compra->fecha_compra = $request->get('fecha_compra');

                $compra->save();
                
                foreach ($request-> juegosComprados as $detalle) {
                    $juegoComprado = new JuegoComprado();
                    $juegoComprado->idCompra = $compra->id;
                    $juegoComprado->idJuego = $detalle['idJuego'];
                    $juegoComprado->precioDelMomento = $detalle['precioDelMomento'];
                    $juegoComprado->save();
                }
                $compra->setHidden(['created_at', 'updated_at']);
                return response()->json(['message' => 'Compra realizada correctamente'], 201);
            }else{
                return response()->json(['message' => 'El usuario no esta logeado'], 422);
            }
            
        }catch(ValidationException $e){
            $errors = $e->validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
