<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Resources\CartItemResource;
use App\Filters\CartItemFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Элементы корзины",
 *     description="Операции с элементами корзины"
 * )
 */
class CartItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cart-items",
     *     tags={"Элементы корзины"},
     *     summary="Получить все элементы корзины",
     *     description="Возвращает список всех элементов корзины.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CartItem"))
     *     )
     * )
     */
    public function index(Request $request, CartItemFilter $filter)
    {
        $query = CartItem::query();
        $cartItems = $filter->apply($query)->get();

        return CartItemResource::collection($cartItems);
    }

    /**
     * @OA\Get(
     *     path="/api/cart-items/{id}",
     *     tags={"Элементы корзины"},
     *     summary="Получить элемент корзины по ID",
     *     description="Возвращает элемент корзины по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/CartItem")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент корзины не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $cartItem = CartItem::findOrFail($id);
        return new CartItemResource($cartItem);
    }

    /**
     * @OA\Post(
     *     path="/api/cart-items",
     *     tags={"Элементы корзины"},
     *     summary="Создать новый элемент корзины",
     *     description="Создаёт новый элемент корзины и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/CartItem")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Элемент корзины создан",
     *         @OA\JsonContent(ref="#/components/schemas/CartItem")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $cartItem = CartItem::create($request->all());
        return new CartItemResource($cartItem);
    }

    /**
     * @OA\Put(
     *     path="/api/cart-items/{id}",
     *     tags={"Элементы корзины"},
     *     summary="Обновить элемент корзины",
     *     description="Обновляет существующий элемент корзины по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/CartItem")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Элемент корзины обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/CartItem")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент корзины не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->all());
        return new CartItemResource($cartItem);
    }

    /**
     * @OA\Delete(
     *     path="/api/cart-items/{id}",
     *     tags={"Элементы корзины"},
     *     summary="Удалить элемент корзины",
     *     description="Удаляет существующий элемент корзины по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Элемент корзины удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Элемент корзины не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return response(null, 204);
    }
}
