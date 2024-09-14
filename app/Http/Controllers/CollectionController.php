<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Resources\CollectionResource;
use App\Filters\CollectionFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class CollectionController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/collections",
     *     tags={"Collections"},
     *     summary="Получить все коллекции",
     *     description="Возвращает список всех коллекций.",
     *     @OA\Response(
     *         response=200,
     *         description="Успешная операция",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Collection"))
     *     )
     * )
     */
    public function index(Request $request, CollectionFilter $filter)
    {
        $query = Collection::query();
        $collections = $filter->apply($query)->get();

        return CollectionResource::collection($collections);
    }

    /**
     * @OA\Get(
     *     path="/api/collections/{id}",
     *     tags={"Collections"},
     *     summary="Получить коллекцию по ID",
     *     description="Возвращает коллекцию по указанному ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID коллекции",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешная операция",
     *         @OA\JsonContent(ref="#/components/schemas/Collection")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Коллекция не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $collection = Collection::findOrFail($id);
        return new CollectionResource($collection);
    }

    /**
     * @OA\Post(
     *     path="/api/collections",
     *     tags={"Collections"},
     *     summary="Создать новую коллекцию",
     *     description="Создает новую коллекцию.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Collection")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Коллекция успешно создана",
     *         @OA\JsonContent(ref="#/components/schemas/Collection")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверные данные запроса"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $collection = Collection::create($request->all());
        return new CollectionResource($collection);
    }

    /**
     * @OA\Put(
     *     path="/api/collections/{id}",
     *     tags={"Collections"},
     *     summary="Обновить коллекцию по ID",
     *     description="Обновляет существующую коллекцию.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID коллекции",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Collection")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Коллекция успешно обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Collection")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Коллекция не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->update($request->all());
        return new CollectionResource($collection);
    }

    /**
     * @OA\Delete(
     *     path="/api/collections/{id}",
     *     tags={"Collections"},
     *     summary="Удалить коллекцию по ID",
     *     description="Удаляет коллекцию по указанному ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID коллекции",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Коллекция успешно удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Коллекция не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();
        return response(null, 204);
    }
}
