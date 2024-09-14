<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ProductFilter extends BaseFilter
{
    protected $allowedParams = [
        'title' => 'like',
        'category_id' => '=',
        'collection_id' => '=',
        'color_id' => '=',
        'material_id' => '=',
        'price' => '<=',
    ];

    public function apply($query)
    {
        if ($this->request->has('title')) {
            $query->where('title', 'like', '%' . $this->request->input('title') . '%');
        }

        return parent::apply($query);
    }
}
