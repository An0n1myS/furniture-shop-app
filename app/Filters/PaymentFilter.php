<?php

namespace App\Filters;

class PaymentFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like'
    ];
}
