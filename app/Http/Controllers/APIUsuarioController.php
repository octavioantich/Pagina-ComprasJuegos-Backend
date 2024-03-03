<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class APIUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
 * Devuelve las compras realizadas por un usuario
 *
 * @OA\Get(
 *     path="/usuarios/{id}/compras",
 *     tags={"Usuarios"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID del usuario",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Compras del usuario",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="ID de la compra"
 *                 ),
 *                 @OA\Property(
 *                     property="fecha_compra",
 *                     type="string",
 *                     format="date-time",
 *                     description="Fecha de la compra"
 *                 ),
 *                 @OA\Property(
 *                     property="juegos_comprados",
 *                     type="array",
 *                     @OA\Items(
 *                         @OA\Property(
 *                             property="id",
 *                             type="integer",
 *                             description="ID del juego"
 *                         ),
 *                         @OA\Property(
 *                             property="titulo",
 *                             type="string",
 *                             description="Título del juego"
 *                         ),
 *                         @OA\Property(
 *                             property="descripcion",
 *                             type="string",
 *                             description="Descripción del juego"
 *                         ),
 *                         @OA\Property(
 *                             property="precio",
 *                             type="number",
 *                             format="float",
 *                             description="Precio del juego"
 *                         ),
 *                         @OA\Property(
 *                             property="desarrollador",
 *                             type="object",
 *                             @OA\Property(
 *                                 property="id",
 *                                 type="integer",
 *                                 description="ID del desarrollador"
 *                             ),
 *                             @OA\Property(
 *                                 property="nombre",
 *                                 type="string",
 *                                 description="Nombre del desarrollador"
 *                             ),
 *                             @OA\Property(
 *                                 property="descripcion",
 *                                 type="string",
 *                                 description="Descripción del desarrollador"
 *                             ),
 *                             @OA\Property(
 *                                 property="pais",
 *                                 type="string",
 *                                 description="País del desarrollador"
 *                             )
 *                         )
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Usuario no encontrado",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 description="Mensaje de error"
 *             )
 *         )
 *     )
 * )
 */
    public function comprasUsuario(Request $request){

        //$usuario = Usuario::find($id);
        //$usuario = Auth::guard('clients')->user();
        $usuario = $request->user();

        $compras = $usuario->compras;

        foreach($compras as $compra){
            $compra->juegosComprados->toJson();
            $compra->juegosComprados->setHidden(['created_at', 'updated_at', 'pivot', 'id_item']);
            
            foreach($compra->juegosComprados as $juego){
                $juego->desarrollador->toJson();
                $juego->desarrollador->setHidden(['created_at', 'updated_at']);
            }
        }

        $compras->setHidden(['created_at', 'updated_at', 'id_cliente']);

        return response()->json($compras);
    }

    /**
 * Registra un nuevo usuario.
 *
 * @OA\Post(
 *     path="/usuarios",
 *     tags={"Usuarios"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 required={"nombre","email"},
 *                 @OA\Property(
 *                     property="nombre",
 *                     type="string",
 *                     maxLength=15,
 *                     example="Juan"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string",
 *                     example="juan@mail.com"
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="201",
 *         description="Usuario registrado de forma exitosa",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="usuario registrado de forma exitosa"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="422",
 *         description="Errores de validación",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="errors",
 *                 type="array",
 *                 @OA\Items(
 *                     type="string",
 *                     example="El nombre no puede ser vacío."
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Tag(name="Usuarios"),
 * )
 */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required | string | max:15',
                'email' => 'required | string',
                'password' => 'required | string',
            ], 
            [
                'nombre.required' => 'El nombre no puede ser vacío.',
                'nombre.string' => 'El nombre no tiene el formato adecuado.',
                'nombre.max' => 'La direccion ingresada es más extensa de lo permitido (15 caracteres).',

                'email.required' => 'El mail no puede ser vacío.',
                'email.string' => 'El email no tiene el formato adecuado.',

                'password.required' => 'La contraseña no puede ser vacío.',
                'password.string' => 'La contraseña no tiene el formato adecuado.',
            ]);

            

            $client = new Usuario();

            $client->nombre = $request->get('nombre');
            $client->email = $request->get('email');
            $client->password = bcrypt($request->get('password'));

            //Auth::guard('client')->login($usuario);

            $client->save();

            $token = $client->createToken('API token of '. $client->email)->plainTextToken;

            return response()->json(['message' => 'usuario registrado de forma exitosa', 'client' => $client, 'token' => $token], 201);
        }
        catch(ValidationException $e){
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

    public function login(Request $request)
    {
        $jsonResponse = null;
        try{
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ],
            ['email.required' => 'El mail no puede ser vacío.',
            'email.string' => 'El email no tiene el formato adecuado.',

            'password.required' => 'La contraseña no puede ser vacío.',
            'password.string' => 'La contraseña no tiene el formato adecuado.',
            ]);
            if($this->isUserValid($request)){
                $client = Usuario::where('email', $request->email)->first();
                $jsonResponse = [
                    'client' => $client,
                    'token' => $client->createToken('Api token of '. $client->email)->plainTextToken
                ];
            }else{
                return response()->json(['error' => 'Credenciales incorrectas'], 401);
            }

            return $jsonResponse;

        }catch(ValidationException $e){
            $errors = $e->validator->errors()->all();

            return response()->json(['errors' => $errors], 422);
        }
    }

    private function isUserValid($request){
        $credentials = $request->only('email', 'password');
        return Auth::guard('client')->attempt($credentials);
    }

    public function logout(Request $request){
        $client = $request->user();
        
        $client->tokens()->delete();

        return $this->success([], "Sesion cerrada exitosamente");
    }

}
