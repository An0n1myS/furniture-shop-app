<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Продукты",
 *     description="Операции с продуктами"
 * )
 */
class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/products",
     *     tags={"Продукты"},
     *     summary="Получить все продукты",
     *     description="Возвращает список всех продуктов.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Product"))
     *     )
     * )
     */
    public function index(Request $request, ProductFilter $filter)
    {
        $query = Product::query();
        $products = $filter->apply($query)->get();

        return ProductResource::collection($products);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/products/{id}",
     *     tags={"Продукты"},
     *     summary="Получить продукт по ID",
     *     description="Возвращает продукт по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Продукт не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/products",
     *     tags={"Продукты"},
     *     summary="Создать новый продукт",
     *     description="Создаёт новый продукт и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Продукт создан",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/products/{id}",
     *     tags={"Продукты"},
     *     summary="Обновить продукт",
     *     description="Обновляет существующий продукт по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Продукт обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Продукт не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/products/{id}",
     *     tags={"Продукты"},
     *     summary="Удалить продукт",
     *     description="Удаляет существующий продукт по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Продукт удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Продукт не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response(null, 204);
    }
}
