<?php
namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Http\Resources\DeliveryResource;
use App\Filters\DeliveryFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Доставки",
 *     description="Операции с доставками"
 * )
 */
class DeliveryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/deliveries",
     *     tags={"Доставки"},
     *     summary="Получить все доставки",
     *     description="Возвращает список всех доставок.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Delivery"))
     *     )
     * )
     */
    public function index(Request $request, DeliveryFilter $filter)
    {
        $query = Delivery::query();
        $deliveries = $filter->apply($query)->get();

        return DeliveryResource::collection($deliveries);
    }

    /**
     * @OA\Get(
     *     path="/deliveries/{id}",
     *     tags={"Доставки"},
     *     summary="Получить доставку по ID",
     *     description="Возвращает доставку по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Delivery")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Доставка не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);
        return new DeliveryResource($delivery);
    }

    /**
     * @OA\Post(
     *     path="/deliveries",
     *     tags={"Доставки"},
     *     summary="Создать новую доставку",
     *     description="Создаёт новую доставку и возвращает её.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Delivery")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Доставка создана",
     *         @OA\JsonContent(ref="#/components/schemas/Delivery")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $delivery = Delivery::create($request->all());
        return new DeliveryResource($delivery);
    }

    /**
     * @OA\Put(
     *     path="/deliveries/{id}",
     *     tags={"Доставки"},
     *     summary="Обновить доставку",
     *     description="Обновляет существующую доставку по её ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Delivery")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Доставка обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Delivery")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Доставка не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->update($request->all());
        return new DeliveryResource($delivery);
    }

    /**
     * @OA\Delete(
     *     path="/deliveries/{id}",
     *     tags={"Доставки"},
     *     summary="Удалить доставку",
     *     description="Удаляет существующую доставку по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Доставка удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Доставка не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
        return response(null, 204);
    }
}
