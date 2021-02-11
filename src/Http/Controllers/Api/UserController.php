<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Iyngaran\User\Actions\CreateAction;
use Iyngaran\User\Actions\DeleteAction;
use Iyngaran\User\Actions\UpdateAction;
use Iyngaran\User\Http\Requests\DestroyRequest;
use Iyngaran\User\Http\Requests\IndexRequest;
use Iyngaran\User\Http\Requests\ShowRequest;
use Iyngaran\User\Http\Requests\StoreRequest;
use Iyngaran\User\Http\Requests\UpdateRequest;
use Iyngaran\User\Http\Resources\UserResource;
use Iyngaran\User\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    public function index(IndexRequest $request, UserRepositoryInterface $user): JsonResponse
    {
        return response()->json($user->all($request));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json(
            new UserResource((new CreateAction())->execute($request->all())),
            201
        );
    }

    public function show(ShowRequest $request, UserRepositoryInterface $user, $id): JsonResponse
    {
        return response()->json(new UserResource($user->find($id)));
    }

    public function update(UpdateRequest $request, UserRepositoryInterface $user, $id): JsonResponse
    {
        return response()->json(
            new UserResource((new UpdateAction())->execute($request->all(), $user->find($id))),
            200
        );
    }

    public function destroy(DestroyRequest $request, UserRepositoryInterface $user, $id): JsonResponse
    {
        return response()->json((new DeleteAction())->execute($user->find($id)), 204);
    }
}
