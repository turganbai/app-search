<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class LikeHandle extends Handler
{
    public function run(Builder $query, $attribute)
    {
        if ($this->has){
            $query->where($attribute, 'like', '%'.$this->value.'%');
        }
    }

}
