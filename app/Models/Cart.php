<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     schema="Cart",
 *     type="object",
 *     required={"id", "user_id", "product_id", "quantity"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID корзины"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="ID пользователя"
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="ID продукта"
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         type="integer",
 *         description="Количество"
 *     )
 * )
 */
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
