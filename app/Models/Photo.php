<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Photo",
 *     type="object",
 *     required={"id", "file_path", "product_id"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID фото"
 *     ),
 *     @OA\Property(
 *         property="file_path",
 *         type="string",
 *         description="Путь к файлу фото"
 *     ),
 *     @OA\Property(
 *         property="product_id",
 *         type="integer",
 *         description="ID продукта, к которому относится фото"
 *     )
 * )
 */
class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'photo_url',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
