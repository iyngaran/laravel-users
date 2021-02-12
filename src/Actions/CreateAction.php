<?php


namespace Iyngaran\User\Actions;

use Iyngaran\User\DTO\UserData;

class CreateAction
{
    public function execute(UserData $data)
    {
        $user = getUserModel()::create(
            array_merge(
                $data->only(
                'name',
                'email',
                'password',
                'company_name',
                'address',
                'city',
                'state',
                'country',
                'mobile',
                'phone'
            )
                ->toArray(),
                [
                    'is_active' => config('users.default_status', 0),
                ]
            )
        );

        $user->profile()->create(
            $data->only(
                'profile_picture',
                'website_address',
                'social_media_links',
                'location_lat',
                'location_lon',
                'extra_fields'
            )
                ->toArray()
        );

        if ($roles = $data->only('roles')->toArray()) {
            if (isset($roles['roles'])) {
                $user->assignRole($roles);
            } else {
                $user->assignRole(config('users.default_roles', ['Guest']));
            }
        }

        if ($permissions = $data->only('permissions')->toArray()) {
            if (isset($roles['permissions'])) {
                foreach ($permissions as $permission) {
                    $user->givePermissionTo($permission);
                }
            }
        }

        return getUserModel()::with('profile')->find($user->id);
    }
}
