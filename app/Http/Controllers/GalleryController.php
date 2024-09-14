<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Resources\GalleryResource;
use App\Filters\GalleryFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Галереи",
 *     description="Операции с галереями"
 * )
 */
class GalleryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/galleries",
     *     tags={"Галереи"},
     *     summary="Получить все галереи",
     *     description="Возвращает список всех галерей.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Gallery"))
     *     )
     * )
     */
    public function index(Request $request, GalleryFilter $filter)
    {
        $query = Gallery::query();
        $galleries = $filter->apply($query)->get();

        return GalleryResource::collection($galleries);
    }

    /**
     * @OA\Get(
     *     path="/api/galleries/{id}",
     *     tags={"Галереи"},
     *     summary="Получить галерею по ID",
     *     description="Возвращает галерею по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Gallery")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Галерея не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return new GalleryResource($gallery);
    }

    /**
     * @OA\Post(
     *     path="/api/galleries",
     *     tags={"Галереи"},
     *     summary="Создать новую галерею",
     *     description="Создаёт новую галерею и возвращает её.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Gallery")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Галерея создана",
     *         @OA\JsonContent(ref="#/components/schemas/Gallery")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $gallery = Gallery::create($request->all());
        return new GalleryResource($gallery);
    }

    /**
     * @OA\Put(
     *     path="/api/galleries/{id}",
     *     tags={"Галереи"},
     *     summary="Обновить галерею",
     *     description="Обновляет существующую галерею по её ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Gallery")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Галерея обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Gallery")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Галерея не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return new GalleryResource($gallery);
    }

    /**
     * @OA\Delete(
     *     path="/api/galleries/{id}",
     *     tags={"Галереи"},
     *     summary="Удалить галерею",
     *     description="Удаляет существующую галерею по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Галерея удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Галерея не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return response(null, 204);
    }
}
