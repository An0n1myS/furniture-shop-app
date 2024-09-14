<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'color_id' => $this->color_id,
            'collection_id' => $this->collection_id,
            'category_id' => $this->category_id,
            'material_id' => $this->material_id,
        ];
    }
}
