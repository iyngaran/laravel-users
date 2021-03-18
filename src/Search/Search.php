<?php


namespace Iyngaran\User\Search;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Search
{
    protected function apply(Request $filters, Model $model): Builder
    {
        return static::applyDecoratorsFromRequest($filters, $model->newQuery());
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query): Builder
    {
        foreach ($request->all() as $filterName => $value) {
            if (isset($value) && !empty($value)) {
                $decorator = static::createFilterDecorator($filterName);
                if (static::isValidDecorator($decorator)) {
                    $query = $decorator::apply($query, $value);
                }
            }
        }

        return $query;
    }

    private static function createFilterDecorator($name): string
    {
        return __NAMESPACE__.'\\Filters\\'.str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $name)));
    }

    private static function isValidDecorator($decorator): bool
    {
        return class_exists($decorator);
    }
}
