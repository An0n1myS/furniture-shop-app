<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Payment",
 *     description="Payment model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the payment"
 *     ),
 *     @OA\Property(
 *         property="order_id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the order"
 *     ),
 *     @OA\Property(
 *         property="amount",
 *         type="number",
 *         format="float",
 *         description="Amount of the payment"
 *     ),
 *     @OA\Property(
 *         property="payment_method",
 *         type="string",
 *         description="Payment method"
 *     ),
 *     @OA\Property(
 *         property="payment_date",
 *         type="string",
 *         format="date-time",
 *         description="Payment date"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Creation timestamp"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Last update timestamp"
 *     ),
 *     required={"id", "order_id", "amount", "payment_method"}
 * )
 */
class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
