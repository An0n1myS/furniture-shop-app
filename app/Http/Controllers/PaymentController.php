<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use App\Filters\PaymentFilter;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request, PaymentFilter $filter)
    {
        $query = Payment::query();
        $payments = $filter->apply($query)->get();

        return PaymentResource::collection($payments);
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return new PaymentResource($payment);
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return new PaymentResource($payment);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return new PaymentResource($payment);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response(null, 204);
    }
}
