<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Iyngaran\User\Actions\RegisterAction;
use Iyngaran\User\DTO\UserData;
use Iyngaran\User\Http\Requests\RegistrationRequest;
use Iyngaran\User\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        return response()->json(
            new UserResource((new RegisterAction)->execute(UserData::formRequest($request))),
            201
        );
    }
}
