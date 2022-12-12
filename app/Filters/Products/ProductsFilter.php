<?php

namespace App\Filters\Products;

use App\Filters\AbstractFilter;

class ProductsFilter extends AbstractFilter
{
    protected $filters = [
        'price' => PriceFilter::class,
        'category_id' => CategoryIdFilter::class,
        'authour_id' => AuthourIdFilter::class,
    ];
}
