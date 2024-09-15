<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Resources\OrderItemResource;
use App\Filters\OrderItemFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Элементы заказа",
 *     description="Операции с элементами заказа"
 * )
 */
class OrderItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/order-items",
     *     tags={"Элементы заказа"},
     *     summary="Получить все элементы заказа",
     *     description="Возвращает список всех элементов заказа.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/OrderItem"))
     *     )
     * )
     */
    public function index(Request $request, OrderItemFilter $filter)
    {
        $query = OrderItem::query();
        $orderItems = $filter->apply($query)->get();

        return OrderItemResource::collection($orderItems);
    }

    /**
     * @OA\Get(
     *     path="/order-items/{id}",
     *     tags={"Элементы заказа"},
     *     summary="Получить элемент заказа по ID",
     *     description="Возвращает элемент заказа по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/OrderItem")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент заказа не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return new OrderItemResource($orderItem);
    }

    /**
     * @OA\Post(
     *     path="/order-items",
     *     tags={"Элементы заказа"},
     *     summary="Создать новый элемент заказа",
     *     description="Создаёт новый элемент заказа и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/OrderItem")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Элемент заказа создан",
     *         @OA\JsonContent(ref="#/components/schemas/OrderItem")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());
        return new OrderItemResource($orderItem);
    }

    /**
     * @OA\Put(
     *     path="/order-items/{id}",
     *     tags={"Элементы заказа"},
     *     summary="Обновить элемент заказа",
     *     description="Обновляет существующий элемент заказа по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/OrderItem")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Элемент заказа обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/OrderItem")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент заказа не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($request->all());
        return new OrderItemResource($orderItem);
    }

    /**
     * @OA\Delete(
     *     path="/order-items/{id}",
     *     tags={"Элементы заказа"},
     *     summary="Удалить элемент заказа",
     *     description="Удаляет существующий элемент заказа по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Элемент заказа удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент заказа не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();
        return response(null, 204);
    }
}
