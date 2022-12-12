<?php

namespace App\Filters\Products;

class PriceFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereBetween('price', [$value[0], $value[1]]);
    }
}
