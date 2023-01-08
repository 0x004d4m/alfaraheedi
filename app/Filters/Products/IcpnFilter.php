<?php

namespace App\Filters\Products;

class IcpnFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('icpn', 'LIKE', "%$value%");
    }
}
