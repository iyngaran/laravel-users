<?php


namespace Iyngaran\User\Repositories;


class UserRepository implements UserRepositoryInterface
{

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    public function findWithRolesAndPermissions(int $id)
    {
        // TODO: Implement findWithRolesAndPermissions() method.
    }

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    private function getUserModel()
    {
        return config('users.model');
    }
}
