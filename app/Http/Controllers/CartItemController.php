<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Resources\CartItemResource;
use App\Filters\CartItemFilter;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index(Request $request, CartItemFilter $filter)
    {
        $query = CartItem::query();
        $cartItems = $filter->apply($query)->get();

        return CartItemResource::collection($cartItems);
    }

    public function show($id)
    {
        $cartItem = CartItem::findOrFail($id);
        return new CartItemResource($cartItem);
    }

    public function store(Request $request)
    {
        $cartItem = CartItem::create($request->all());
        return new CartItemResource($cartItem);
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($request->all());
        return new CartItemResource($cartItem);
    }

    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();
        return response(null, 204);
    }
}
