<?php

namespace App\Filters;

class OrderItemFilter extends BaseFilter
{
    protected $allowedParams = [
        'order_id' => '=',
        'product_id' => '=',
        'count' => '>=',
        'total_price' => '<=',
    ];
}
