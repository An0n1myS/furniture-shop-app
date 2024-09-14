<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'total_price' => $this->total_price,
        ];
    }
}
