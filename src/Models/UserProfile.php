<?php


namespace Iyngaran\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Iyngaran\User\Casts\Json;

class UserProfile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'extra_fields' => Json::class,
        'social_media_links' => Json::class,
    ];


    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(getUserModel());
    }

}
