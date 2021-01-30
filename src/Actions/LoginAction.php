<?php


namespace Iyngaran\User\Actions;

use Illuminate\Support\Facades\Hash;
use Iyngaran\User\Http\Resources\UserResource;

class LoginAction
{
    public function execute(array $attributes): array
    {
        try {
            $user = $this->getUserModel()
                ::where('email', readAttribute($attributes, 'email'))
                ->first();

            if (! $user) {
                return [
                    'errors' => [
                        'email' => ['Invalid E-mail Address'],
                    ],
                ];
            }

            if (! Hash::check(readAttribute($attributes, 'password'), $user->password)) {
                return [
                    'errors' => [
                        'password' => ['Invalid Password'],
                    ],
                ];
            }

            $accessToken = $user
                ->createToken(readAttribute($attributes, 'device_name'))
                ->plainTextToken;

            $user = $this->getUserModel()
                ::with('roles', 'permissions')
                ->find($user->id);

            return [
                'user' => new UserResource($user),
                'token' => $accessToken,
            ];
        } catch (\Exception $ex) {
            return [
                'errors' => [
                    'message' => [$ex->getMessage()],
                ],
            ];
        }
    }

    private function getUserModel()
    {
        return config('users.model');
    }
}
