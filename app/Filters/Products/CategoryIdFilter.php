<?php

namespace App\Filters\Products;

class CategoryIdFilter
{
    public function filter($builder, $value)
    {
        if(is_array($value)){
            return $builder->whereIn('category_id', $value);
        }else{
            return $builder->where('category_id', $value);
        }
    }
}
