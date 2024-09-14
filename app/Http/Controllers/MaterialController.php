<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Resources\MaterialResource;
use App\Filters\MaterialFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Материалы",
 *     description="Операции с материалами"
 * )
 */
class MaterialController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/materials",
     *     tags={"Материалы"},
     *     summary="Получить все материалы",
     *     description="Возвращает список всех материалов.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Material"))
     *     )
     * )
     */
    public function index(Request $request, MaterialFilter $filter)
    {
        $query = Material::query();
        $materials = $filter->apply($query)->get();

        return MaterialResource::collection($materials);
    }

    /**
     * @OA\Get(
     *     path="/api/materials/{id}",
     *     tags={"Материалы"},
     *     summary="Получить материал по ID",
     *     description="Возвращает материал по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Material")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Материал не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $material = Material::findOrFail($id);
        return new MaterialResource($material);
    }

    /**
     * @OA\Post(
     *     path="/api/materials",
     *     tags={"Материалы"},
     *     summary="Создать новый материал",
     *     description="Создаёт новый материал и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Material")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Материал создан",
     *         @OA\JsonContent(ref="#/components/schemas/Material")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $material = Material::create($request->all());
        return new MaterialResource($material);
    }

    /**
     * @OA\Put(
     *     path="/api/materials/{id}",
     *     tags={"Материалы"},
     *     summary="Обновить материал",
     *     description="Обновляет существующий материал по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Material")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Материал обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/Material")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Материал не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->update($request->all());
        return new MaterialResource($material);
    }

    /**
     * @OA\Delete(
     *     path="/api/materials/{id}",
     *     tags={"Материалы"},
     *     summary="Удалить материал",
     *     description="Удаляет существующий материал по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Материал удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Материал не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return response(null, 204);
    }
}
