<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Iyngaran\User\Actions\LoginAction;
use Iyngaran\User\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        return response()->json(
            (new LoginAction())
                ->execute($request->all()),
            200
        );
    }
}
