<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class LikeHandle extends Handler
{
    public function run(Builder $query, $attribute)
    {
        if ($this->has){
            $value = strtolower(trim($this->value));
            $query->whereRaw("LOWER(`$attribute`) LIKE '%$value%'");
        }
    }

}
