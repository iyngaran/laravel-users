<?php


namespace Iyngaran\User\Search;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchUser extends Search
{
    public function getResults(FormRequest $filters)
    {
        return $this->apply($filters)->get();
    }

    public function getPaginatedResults(FormRequest $filters): ?LengthAwarePaginator
    {
        $currentPage = $filters->input('page');
        $reqPerPage = $filters->input('per-page');
        $reqSortBy = $filters->input('sort-by');
        $reqSortOrder = $filters->input('order');

        if (!$reqPerPage) {
            $reqPerPage = config('users.defaults.per-page');
        }

        if (!$reqSortBy) {
            $reqSortBy = config('users.defaults.order-by');
        }

        if (!$reqSortOrder) {
            $reqSortOrder = config('users.defaults.order-in');
        }


        Paginator::currentPageResolver(
            function () use ($currentPage) {
                return $currentPage;
            }
        );

        $userModel = getUserModel();
        return $this->apply($filters, new $userModel)
            ->orderBy($reqSortBy, $reqSortOrder)
            ->paginate($reqPerPage);
    }
}
