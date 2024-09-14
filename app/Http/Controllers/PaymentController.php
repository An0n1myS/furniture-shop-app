<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use App\Filters\PaymentFilter;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Платежи",
 *     description="Операции с платежами"
 * )
 */
class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/payments",
     *     tags={"Платежи"},
     *     summary="Получить все платежи",
     *     description="Возвращает список всех платежей.",
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Payment"))
     *     )
     * )
     */
    public function index(Request $request, PaymentFilter $filter)
    {
        $query = Payment::query();
        $payments = $filter->apply($query)->get();

        return PaymentResource::collection($payments);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/payments/{id}",
     *     tags={"Платежи"},
     *     summary="Получить платеж по ID",
     *     description="Возвращает платеж по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Операция выполнена успешно",
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Платеж не найден"
     *     )
     * )
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return new PaymentResource($payment);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/payments",
     *     tags={"Платежи"},
     *     summary="Создать новый платеж",
     *     description="Создаёт новый платеж и возвращает его.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/Payment")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Платеж создан",
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Неверный ввод"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
        return new PaymentResource($payment);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/payments/{id}",
     *     tags={"Платежи"},
     *     summary="Обновить платеж",
     *     description="Обновляет существующий платеж по его ID.",
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
     *             @OA\Schema(ref="#/components/schemas/Payment")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Платеж обновлён",
     *         @OA\JsonContent(ref="#/components/schemas/Payment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Платеж не найден"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->all());
        return new PaymentResource($payment);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/payments/{id}",
     *     tags={"Платежи"},
     *     summary="Удалить платеж",
     *     description="Удаляет существующий платеж по его ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Платеж удалён"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Платеж не найден"
     *     )
     * )
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response(null, 204);
    }
}
