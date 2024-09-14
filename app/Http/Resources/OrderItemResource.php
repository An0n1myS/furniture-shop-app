<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'total_price' => $this->total_price,
        ];
    }
}
