<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Filters\OrderFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Заказы",
 *     description="Операции с заказами"
 * )
 */
class OrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/orders",
     *     tags={"Заказы"},
     *     summary="Получить все заказы",
     *     description="Возвращает список всех заказов.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Order"))
     *     )
     * )
     */
    public function index(Request $request, OrderFilter $filter)
    {
        $query = Order::query();
        $orders = $filter->apply($query)->get();

        return OrderResource::collection($orders);
    }

    /**
     * @OA\Get(
     *     path="/orders/{id}",
     *     tags={"Заказы"},
     *     summary="Получить заказ по ID",
     *     description="Возвращает заказ по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Заказ не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return new OrderResource($order);
    }

    /**
     * @OA\Post(
     *     path="/orders",
     *     tags={"Заказы"},
     *     summary="Создать новый заказ",
     *     description="Создаёт новый заказ и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Order")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Заказ создан",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return new OrderResource($order);
    }

    /**
     * @OA\Put(
     *     path="/orders/{id}",
     *     tags={"Заказы"},
     *     summary="Обновить заказ",
     *     description="Обновляет существующий заказ по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Order")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Заказ обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Заказ не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return new OrderResource($order);
    }

    /**
     * @OA\Delete(
     *     path="/orders/{id}",
     *     tags={"Заказы"},
     *     summary="Удалить заказ",
     *     description="Удаляет существующий заказ по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Заказ удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Заказ не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response(null, 204);
    }
}
