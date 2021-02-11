<?php


namespace Iyngaran\User\DTO;

use Illuminate\Foundation\Http\FormRequest;
use Iyngaran\User\Http\Requests\RegistrationRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
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
    public ?string $social_media_links;
    public ?string $location_lat;
    public ?string $location_lon;
    public ?string $extra_fields;

    /**
     * @var Role[]|null
     */
    public ?array $role;

    /**
     * @var Permission[]|null
     */
    public ?array $permission;

    public static function formRequest(FormRequest $request)
    {
        dd($request->all());
    }
}
