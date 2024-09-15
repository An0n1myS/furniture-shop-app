<?php
namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Resources\ColorResource;
use App\Filters\ColorFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Цвета",
 *     description="Операции с цветами"
 * )
 */
class ColorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/colors",
     *     tags={"Цвета"},
     *     summary="Получить все цвета",
     *     description="Возвращает список всех цветов.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Color"))
     *     )
     * )
     */
    public function index(Request $request, ColorFilter $filter)
    {
        $query = Color::query();
        $colors = $filter->apply($query)->get();

        return ColorResource::collection($colors);
    }

    /**
     * @OA\Get(
     *     path="/colors/{id}",
     *     tags={"Цвета"},
     *     summary="Получить цвет по ID",
     *     description="Возвращает цвет по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Color")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Цвет не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $color = Color::findOrFail($id);
        return new ColorResource($color);
    }

    /**
     * @OA\Post(
     *     path="/colors",
     *     tags={"Цвета"},
     *     summary="Создать новый цвет",
     *     description="Создаёт новый цвет и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Color")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Цвет создан",
     *         @OA\JsonContent(ref="#/components/schemas/Color")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $color = Color::create($request->all());
        return new ColorResource($color);
    }

    /**
     * @OA\Put(
     *     path="/colors/{id}",
     *     tags={"Цвета"},
     *     summary="Обновить цвет",
     *     description="Обновляет существующий цвет по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Color")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Цвет обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/Color")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Цвет не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->update($request->all());
        return new ColorResource($color);
    }

    /**
     * @OA\Delete(
     *     path="/colors/{id}",
     *     tags={"Цвета"},
     *     summary="Удалить цвет",
     *     description="Удаляет существующий цвет по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Цвет удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Цвет не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return response(null, 204);
    }
}
