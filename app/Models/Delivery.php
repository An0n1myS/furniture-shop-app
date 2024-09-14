<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Delivery",
 *     description="Delivery model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the delivery"
 *     ),
 *     @OA\Property(
 *         property="order_id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the order"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         description="Delivery status"
 *     ),
 *     @OA\Property(
 *         property="delivery_date",
 *         type="string",
 *         format="date-time",
 *         description="Scheduled delivery date"
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
 *     required={"id", "order_id", "status"}
 * )
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
