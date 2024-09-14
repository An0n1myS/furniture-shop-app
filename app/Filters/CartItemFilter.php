<?php

namespace App\Filters;

class CartItemFilter extends BaseFilter
{
    protected $allowedParams = [
        'cart_id' => '=',
        'product_id' => '=',
        'count' => '>=',
        'total_price' => '<=',
    ];
}
