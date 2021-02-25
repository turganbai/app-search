<?php


namespace App\Services\Filters;


use Illuminate\Database\Eloquent\Builder;

class Filter
{
    public static function run(Builder $query, $attribute, Handler $handler): void
    {
        $handler->run($query, $attribute);
    }
}
