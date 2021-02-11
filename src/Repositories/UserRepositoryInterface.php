<?php


namespace Iyngaran\User\Repositories;


interface UserRepositoryInterface
{
    public function find(int $id);
    public function findWithRolesAndPermissions(int $id);
    public function all(): ?Collection;
}
