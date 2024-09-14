<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Filters\CartFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Корзины",
 *     description="Операции с корзинами"
 * )
 */
class CartController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/carts",
     *     tags={"Корзины"},
     *     summary="Получить все корзины",
     *     description="Возвращает список всех корзин.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Cart"))
     *     )
     * )
     */
    public function index(Request $request, CartFilter $filter)
    {
        $query = Cart::query();
        $carts = $filter->apply($query)->get();

        return CartResource::collection($carts);
    }

    /**
     * @OA\Get(
     *     path="/api/carts/{id}",
     *     tags={"Корзины"},
     *     summary="Получить корзину по ID",
     *     description="Возвращает корзину по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Cart")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Корзина не найдена"
     *     )
     * )
     */
    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        return new CartResource($cart);
    }

    /**
     * @OA\Post(
     *     path="/api/carts",
     *     tags={"Корзины"},
     *     summary="Создать новую корзину",
     *     description="Создаёт новую корзину и возвращает её.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Cart")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Корзина создана",
     *         @OA\JsonContent(ref="#/components/schemas/Cart")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return new CartResource($cart);
    }

    /**
     * @OA\Put(
     *     path="/api/carts/{id}",
     *     tags={"Корзины"},
     *     summary="Обновить корзину",
     *     description="Обновляет существующую корзину по её ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Cart")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Корзина обновлена",
     *         @OA\JsonContent(ref="#/components/schemas/Cart")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Корзина не найдена"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return new CartResource($cart);
    }

    /**
     * @OA\Delete(
     *     path="/api/carts/{id}",
     *     tags={"Корзины"},
     *     summary="Удалить корзину",
     *     description="Удаляет существующую корзину по её ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Корзина удалена"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Корзина не найдена"
     *     )
     * )
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response(null, 204);
    }
}
