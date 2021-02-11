<?php


namespace Iyngaran\User\Repositories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Iyngaran\User\Exceptions\UserNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    public function find(int $id)
    {
        $user = getUserModel()::find($id);
        if ($user) {
            return $user;
        }

        throw new UserNotFoundException("The user details does not exist");
    }

    public function findWithRolesAndPermissions(int $id)
    {
        $user = getUserModel()::with('roles', 'permissions')->find($id);
        if ($user) {
            return $user;
        }

        throw new UserNotFoundException("The user details does not exist");
    }

    public function all(FormRequest $request): ?LengthAwarePaginator
    {
        $page = $request->input('page');
        $per_page = $request->input('per-page');
        $order_by = $request->input('order-by');
        $order_in = $request->input('order-in');

        if (! $per_page) {
            $per_page = config('users.defaults.per-page');
        }

        if (! $order_by) {
            $order_by = config('users.defaults.order-by');
        }

        if (! $order_in) {
            $order_in = config('users.defaults.order-in');
        }

        Paginator::currentPageResolver(
            function () use ($page) {
                return $page;
            }
        );

        return getUserModel()::orderBy($order_by, $order_in)->paginate($per_page);
    }
}
