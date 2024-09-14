<?php

namespace App\Filters;

class MaterialFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
    ];
}
