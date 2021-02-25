<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

abstract class Handler
{
    protected $value;
    protected $has;

    /**
     * Handler constructor.
     * @param $has
     */
    public function __construct($has)
    {
        $this->has = $has;
    }

    abstract public function run(Builder $query, $attribute);


    public function setValue($value): Handler
    {
        $this->value = $value;
        return $this;
    }
}
