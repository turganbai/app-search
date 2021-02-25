<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class BetweenHandle extends Handler
{
    private $min;
    private $max;
    public function run(Builder $query, $attribute)
    {
        if ($this->has) {
            $query->whereBetween($attribute, [$this->min, $this->max]);
        }
    }

    /**
     * @param mixed $min
     * @return BetweenHandle
     */
    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @param mixed $max
     * @return BetweenHandle
     */
    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }

}
