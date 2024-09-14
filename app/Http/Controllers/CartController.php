<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Resources\CartResource;
use App\Filters\CartFilter;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request, CartFilter $filter)
    {
        $query = Cart::query();
        $carts = $filter->apply($query)->get();

        return CartResource::collection($carts);
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        return new CartResource($cart);
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return new CartResource($cart);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return new CartResource($cart);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response(null, 204);
    }
}
