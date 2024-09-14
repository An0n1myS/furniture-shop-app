<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="My Documentation for Furniture App API",
 *     version="1.0.0",
 *     description="Документация API для приложения Furniture App",
 *     @OA\Contact(
 *         email="support@furnitureapp.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Local Development Server"
 * )
 */
class SwaggerAnnotations
{
    // Этот класс не должен содержать методов.
}
