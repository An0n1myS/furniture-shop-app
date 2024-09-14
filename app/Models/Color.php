<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Color",
 *     description="Color model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the color"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the color"
 *     ),
 *     @OA\Property(
 *         property="hex_code",
 *         type="string",
 *         description="Hexadecimal color code"
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
 *     required={"id", "name", "hex_code"}
 * )
 */
class Color extends Model
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
