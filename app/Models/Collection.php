<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Collection",
 *     description="Collection model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the collection"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the collection"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the collection"
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
 *     required={"id", "name"}
 * )
 */
class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
