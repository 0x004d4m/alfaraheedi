<?php

namespace App\Filters\Products;

use App\Filters\AbstractFilter;

class ProductsFilter extends AbstractFilter
{
    protected $filters = [
        'icpn' => IcpnFilter::class,
        'category_id' => CategoryIdFilter::class,
        'authour_id' => AuthourIdFilter::class,
    ];
}
