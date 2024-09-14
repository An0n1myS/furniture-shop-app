<?php

namespace App\Filters;

class CartFilter extends BaseFilter
{
    protected $allowedParams = [
        'user_id' => '=',
    ];
}
