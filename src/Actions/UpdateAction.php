<?php


namespace Iyngaran\User\Actions;

class UpdateAction
{
    public function execute(array $attributes, $user)
    {
        $user->update(
            [
                'name' => readAttribute($attributes, 'name'),
                'email' => readAttribute($attributes, 'email'),
                'password' => readAttribute($attributes, 'password'),
                'is_active' => config('users.default_status', 0),
                'company_name' => readAttribute($attributes, 'company_name'),
                'address' => readAttribute($attributes, 'address'),
                'city' => readAttribute($attributes, 'city'),
                'state' => readAttribute($attributes, 'state'),
                'country' => readAttribute($attributes, 'country'),
                'mobile' => readAttribute($attributes, 'mobile'),
                'phone' => readAttribute($attributes, 'phone'),
            ]
        );

        $user->profile->update(
            [
                'profile_picture' => readAttribute($attributes, 'profile_picture'),
                'website_address' => readAttribute($attributes, 'website_address'),
                'social_media_links' => readAttribute($attributes, 'social_media_links'),
                'location_lat' => readAttribute($attributes, 'location_lat'),
                'location_lon' => readAttribute($attributes, 'location_lon'),
                'extra_fields' => readAttribute($attributes, 'extra_fields'),
            ]
        );
        foreach (readAttribute($attributes, 'roles') as $role) {
            $user->assignRole($role);
        }

        return getUserModel()::with('profile')->find($user->id);
    }
}
