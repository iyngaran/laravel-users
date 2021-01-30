<?php


namespace Iyngaran\User\Traits;

use Iyngaran\User\Models\UserProfile;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

trait UserTrait
{
    use HasRoles;
    use HasPermissions;

    public function initializeUserTrait()
    {
        $this->fillable = array_merge(
            $this->fillable,
            [
                'company_name',
                'address',
                'city',
                'state',
                'country',
                'mobile',
                'phone',
            ]
        );
    }

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserProfile::class);
    }
}
