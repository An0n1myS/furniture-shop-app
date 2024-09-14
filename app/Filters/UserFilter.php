<?php

namespace App\Filters;

class UserFilter extends BaseFilter
{
    protected $allowedParams = [
        'username' => 'like',
        'email' => 'like',
        'first_name' => 'like',
        'last_name' => 'like',
    ];

    public function apply($query)
    {
        if ($this->request->has('username')) {
            $query->where('username', 'like', '%' . $this->request->input('username') . '%');
        }

        return parent::apply($query);
    }
}
