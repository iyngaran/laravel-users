<?php


namespace Iyngaran\User\DTO;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserData extends DataTransferObject
{
    public string $name;
    public string $email;
    public ?string $password;
    public int $is_active;
    public ?string $company_name;
    public ?string $address;
    public ?string $city;
    public ?string $state;
    public ?string $country;
    public ?string $mobile;
    public ?string $phone;
    public ?string $profile_picture;
    public ?string $website_address;
    public ?array $social_media_links;
    public ?float $location_lat;
    public ?float $location_lon;
    public ?array $extra_fields;

    /**
     * @var Spatie\Permission\Models\Role[]|null
     */
    public ?array $roles;

    /**
     * @var Spatie\Permission\Models\Permission[]|null
     */
    public ?array $permissions;

    public static function formRequest(FormRequest $request): self
    {
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'is_active' => config('users.default_status', 0),
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'mobile' => $request->input('mobile'),
            'phone' => $request->input('phone'),
            'profile_picture' => $request->input('profile_picture'),
            'website_address' => $request->input('website_address'),
            'social_media_links' => $request->input('social_media_links'),
            'location_lat' => $request->input('location_lat'),
            'location_lon' => $request->input('location_lon'),
            'extra_fields' => $request->input('extra_fields'),
        ];

        $roles = [];
        if ($request->input('role_ids')) {
            foreach ($request->input('role_ids') as $role_id) {
                array_push($roles, Role::find($role_id));
            }
            $userData['roles'] = $roles;
        }

        $permissions = [];
        if ($request->input('permission_ids')) {
            foreach ($request->input('permission_ids') as $permission_id) {
                array_push($permissions, Permission::find($permission_id));
            }
            $userData['permissions'] = $permissions;
        }

        return (new self(
            $userData
        ));
    }
}
