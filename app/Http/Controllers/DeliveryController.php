<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Http\Resources\DeliveryResource;
use App\Filters\DeliveryFilter;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(Request $request, DeliveryFilter $filter)
    {
        $query = Delivery::query();
        $deliveries = $filter->apply($query)->get();

        return DeliveryResource::collection($deliveries);
    }

    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);
        return new DeliveryResource($delivery);
    }

    public function store(Request $request)
    {
        $delivery = Delivery::create($request->all());
        return new DeliveryResource($delivery);
    }

    public function update(Request $request, $id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->update($request->all());
        return new DeliveryResource($delivery);
    }

    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();
        return response(null, 204);
    }
}
