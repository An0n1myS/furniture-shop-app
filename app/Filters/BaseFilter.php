<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class BaseFilter
{
    protected $request;
    protected $query;
    protected $allowedParams = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($query)
    {
        $this->query = $query;

        foreach ($this->allowedParams as $param => $operator) {
            if ($this->request->has($param)) {
                $this->query->where($param, $operator, $this->request->input($param));
            }
        }

        return $this->query;
    }
}
