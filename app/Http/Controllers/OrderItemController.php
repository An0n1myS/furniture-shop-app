<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Resources\OrderItemResource;
use App\Filters\OrderItemFilter;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Request $request, OrderItemFilter $filter)
    {
        $query = OrderItem::query();
        $orderItems = $filter->apply($query)->get();

        return OrderItemResource::collection($orderItems);
    }

    public function show($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return new OrderItemResource($orderItem);
    }

    public function store(Request $request)
    {
        $orderItem = OrderItem::create($request->all());
        return new OrderItemResource($orderItem);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($request->all());
        return new OrderItemResource($orderItem);
    }

    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();
        return response(null, 204);
    }
}
