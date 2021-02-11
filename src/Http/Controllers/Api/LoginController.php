<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Iyngaran\User\Actions\LoginAction;
use Iyngaran\User\Http\Requests\LoginRequest;
use Iyngaran\User\Http\Resources\AuthenticatedUserResource;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $user = (new LoginAction())->execute($request->all());
        if (isset($user['user'])) {
            return response()->json(new AuthenticatedUserResource([
                'user' => $user['user'],
                'token' => $user['token']
            ]), 200);
        }

        return response()->json($user, 401);
    }
}
