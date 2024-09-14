<?php

namespace App\Filters;

class DeliveryFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
        'price' => '<=',
    ];
}
