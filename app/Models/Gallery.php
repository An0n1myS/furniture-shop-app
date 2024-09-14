<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Gallery",
 *     description="Gallery model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the gallery"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the gallery"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Description of the gallery"
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
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
