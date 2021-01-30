<?php


namespace Iyngaran\User\Http\Controllers\Api;


use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Iyngaran\User\Actions\RegisterAction;
use Iyngaran\User\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{

    public function __invoke(RegistrationRequest $request): JsonResponse
    {
        return response()->json(
            (new RegisterAction)
                ->execute($request->all()),
            201);
    }

}
