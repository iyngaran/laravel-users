<?php


namespace Iyngaran\User\Repositories;

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

    public function all(): ?Collection
    {
        return getUserModel()::all();
    }

    private function getUserModel()
    {
        return config('users.model');
    }
}
