<?php


namespace Iyngaran\User\DTO;

use Iyngaran\User\Http\Requests\RegistrationRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public int $isActive;
    public ?string $companyName;
    public ?string $address;
    public ?string $city;
    public ?string $state;
    public ?string $country;
    public ?string $mobile;
    public ?string $phone;
    public ?string $profilePicture;
    public ?string $websiteAddress;
    public ?string $socialMediaLinks;
    public ?string $lat;
    public ?string $lon;

    /**
     * @var Role[]|null
     */
    public ?array $role;

    /**
     * @var Permission[]|null
     */
    public ?array $permission;

    public static function formRequest(RegistrationRequest $userRegistrationRequest)
    {
    }
}
