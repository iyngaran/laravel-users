<?php


namespace Iyngaran\User\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Email implements Filter
{
    public static function apply(Builder $builder, $value): Builder
    {
        return $builder->where('email', $value);
    }
}
