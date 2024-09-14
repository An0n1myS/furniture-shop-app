<?php

namespace App\Filters;

class OrderFilter extends BaseFilter
{
    protected $allowedParams = [
        'user_id' => '=',
        'payment_id' => '=',
        'delivery_id' => '=',
        'order_price' => '<=',
        'date' => '=',
    ];
}
