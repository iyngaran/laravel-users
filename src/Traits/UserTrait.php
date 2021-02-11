<?php


namespace Iyngaran\User\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iyngaran\User\Models\UserProfile;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

trait UserTrait
{
    use HasRoles;
    use HasPermissions;
    use SoftDeletes;

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
