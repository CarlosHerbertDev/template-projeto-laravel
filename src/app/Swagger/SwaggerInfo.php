<?php

namespace App\Swagger;

/**
 * @OA\OpenApi(
 *     info=@OA\Info(
 *         title="API Usuários - Módulo Autenticação Backend",
 *         version="1.0.0",
 *         description="Documentação da API de Gerenciamento de Usuários"
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 *     description="Insira seu token JWT. Exemplo: seu_token_aqui"
 * )
 */


class SwaggerInfo {}