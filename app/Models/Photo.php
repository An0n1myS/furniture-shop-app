<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
