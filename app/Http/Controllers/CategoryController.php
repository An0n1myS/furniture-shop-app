<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Filters\CategoryFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Категории",
 *     description="Операции с категориями"
 * )
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/categories",
     *     tags={"Категории"},
     *     summary="Получить все категории",
     *     description="Возвращает список всех категорий.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Category"))
     *     )
     * )
     */
    public function index(Request $request, CategoryFilter $filter)
    {
        $query = Category::query();
        $categories = $filter->apply($query)->get();

        return CategoryResource::collection($categories);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/categories/{id}",
     *     tags={"Категории"},
     *     summary="Получить категорию по ID",
     *     description="Возвращает категорию по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Категория не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/categories",
     *     tags={"Категории"},
     *     summary="Создать новую категорию",
     *     description="Создаёт новую категорию и возвращает её.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Category")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Категория создана",
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/categories/{id}",
     *     tags={"Категории"},
     *     summary="Обновить категорию",
     *     description="Обновляет существующую категорию по её ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Category")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Категория обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Категория не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return new CategoryResource($category);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/categories/{id}",
     *     tags={"Категории"},
     *     summary="Удалить категорию",
     *     description="Удаляет существующую категорию по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Категория удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Категория не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response(null, 204);
    }
}
