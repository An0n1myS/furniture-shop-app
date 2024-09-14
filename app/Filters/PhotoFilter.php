<?php

namespace App\Filters;

class PhotoFilter extends BaseFilter
{
    protected $allowedParams = [
        'photo_url' => 'like',
        'gallery_id' => '=',
    ];
}
