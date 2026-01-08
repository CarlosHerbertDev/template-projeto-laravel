<?php

namespace App\Http\Controllers;

class SwaggerTestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/swagger-test",
     *     summary="Endpoint de teste para o Swagger",
     *     tags={"Swagger Test"},
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */

    public function index()
    {
        return response()->json(['message' => 'Swagger funcionando!']);
    }
}
