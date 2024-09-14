<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'payment_id' => $this->payment_id,
            'delivery_id' => $this->delivery_id,
            'order_price' => $this->order_price,
            'date' => $this->date,
        ];
    }
}
