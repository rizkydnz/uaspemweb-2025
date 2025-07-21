<?php

namespace App\OpenApi;

/**
 * @OA\SecurityScheme(
 *     securityScheme="ApiKeyAuth",
 *     type="apiKey",
 *     in="header",
 *     name="X-API-KEY",
 *     description="API Key untuk mengakses endpoint yang dilindungi"
 * )
 */
class SecuritySchemes {}
