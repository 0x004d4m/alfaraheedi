<?php

namespace App\Filters\Products;

class IsbnFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('isbn', 'LIKE', "%$value%");
    }
}
