<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Filters\OrderFilter;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, OrderFilter $filter)
    {
        $query = Order::query();
        $orders = $filter->apply($query)->get();

        return OrderResource::collection($orders);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return new OrderResource($order);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return new OrderResource($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return new OrderResource($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response(null, 204);
    }
}
