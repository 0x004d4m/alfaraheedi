<?php

namespace App\Filters\Products;

class AuthourIdFilter
{
    public function filter($builder, $value)
    {
        if(is_array($value)){
            return $builder->whereIn('authour_id', $value);
        }else{
            return $builder->where('authour_id', $value);
        }
    }
}
