<?php


namespace Iyngaran\User\Actions;

use Illuminate\Support\Facades\Hash;

class AdminLoginAction
{
    public function execute(array $attributes): array
    {
        try {
            $user = getUserModel()
                ::where('email', readAttribute($attributes, 'email'))
                ->first();

            if (! $user) {
                return [
                    'errors' => [
                        'email' => ['Invalid E-mail Address'],
                    ],
                ];
            }

            if ($user->is_active != 1) {
                return [
                    'errors' => [
                        'is_active' => ['The user account is deactivated'],
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

            if (! $user->hasAnyRole(['Administrator'])) {
                return [
                    'errors' => [
                        'user' => ['Invalid user login'],
                    ],
                ];
            }

            $accessToken = $user
                ->createToken(readAttribute($attributes, 'device_name'))
                ->plainTextToken;

            $user = getUserModel()
                ::with('profile', 'roles', 'permissions')
                ->find($user->id);

            return [
                'user' => $user,
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
}
