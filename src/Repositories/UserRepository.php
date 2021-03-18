<?php


namespace Iyngaran\User\Repositories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Iyngaran\User\Exceptions\UserNotFoundException;
use Iyngaran\User\Search\SearchUser;

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

    public function search(FormRequest $request): ?LengthAwarePaginator
    {
        return (new SearchUser())->getPaginatedResults($request);
    }
}
