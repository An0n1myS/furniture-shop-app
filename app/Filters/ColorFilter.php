<?php

namespace App\Filters;

class ColorFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
    ];
}
