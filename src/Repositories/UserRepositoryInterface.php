<?php


namespace Iyngaran\User\Repositories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function find(int $id);

    public function findWithRolesAndPermissions(int $id);

    public function search(FormRequest $request): ?LengthAwarePaginator;
}
