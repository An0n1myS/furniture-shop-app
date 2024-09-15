<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Resources\PhotoResource;
use App\Filters\PhotoFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Фотографии",
 *     description="Операции с фотографиями"
 * )
 */
class PhotoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/photos",
     *     tags={"Фотографии"},
     *     summary="Получить все фотографии",
     *     description="Возвращает список всех фотографий.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Photo"))
     *     )
     * )
     */
    public function index(Request $request, PhotoFilter $filter)
    {
        $query = Photo::query();
        $photos = $filter->apply($query)->get();

        return PhotoResource::collection($photos);
    }

    /**
     * @OA\Get(
     *     path="/photos/{id}",
     *     tags={"Фотографии"},
     *     summary="Получить фотографию по ID",
     *     description="Возвращает фотографию по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Photo")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Фотография не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return new PhotoResource($photo);
    }

    /**
     * @OA\Post(
     *     path="/photos",
     *     tags={"Фотографии"},
     *     summary="Создать новую фотографию",
     *     description="Создаёт новую фотографию и возвращает её.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Photo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Фотография создана",
     *         @OA\JsonContent(ref="#/components/schemas/Photo")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $photo = Photo::create($request->all());
        return new PhotoResource($photo);
    }

    /**
     * @OA\Put(
     *     path="/photos/{id}",
     *     tags={"Фотографии"},
     *     summary="Обновить фотографию",
     *     description="Обновляет существующую фотографию по её ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Photo")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Фотография обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Photo")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Фотография не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);
        $photo->update($request->all());
        return new PhotoResource($photo);
    }

    /**
     * @OA\Delete(
     *     path="/photos/{id}",
     *     tags={"Фотографии"},
     *     summary="Удалить фотографию",
     *     description="Удаляет существующую фотографию по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Фотография удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Фотография не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        return response(null, 204);
    }
}
