<?php

namespace App\Filters;

class CategoryFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
    ];
}
