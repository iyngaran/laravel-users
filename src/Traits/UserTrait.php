<?php


namespace Iyngaran\User\Traits;

use Iyngaran\User\Models\UserProfile;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function passwordResetTokens(): MorphMany
    {
        return $this->morphMany(PasswordResetToken::class, 'tokenable');
    }

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

}
