<?php

namespace App\Filters;

class CollectionFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
    ];
}
