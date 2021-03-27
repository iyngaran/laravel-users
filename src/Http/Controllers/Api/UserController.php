<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Iyngaran\User\Actions\CreateAction;
use Iyngaran\User\DTO\UserData;
use Iyngaran\User\Http\Requests\IndexRequest;
use Iyngaran\User\Http\Requests\StoreRequest;
use Iyngaran\User\Http\Resources\UserResource;
use Iyngaran\User\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    public function index(IndexRequest $request, UserRepositoryInterface $user): AnonymousResourceCollection
    {
        return UserResource::collection($user->search($request));
    }
}
