<?php

namespace App\Filters;

class GalleryFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
        'product_id' => '=',
    ];
}
