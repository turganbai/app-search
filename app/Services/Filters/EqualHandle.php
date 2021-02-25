<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class EqualHandle extends Handler
{
    public function run(Builder $query, $attribute)
    {
        if ($this->has) {
            $query->where($attribute, $this->value);
        }
    }
}
