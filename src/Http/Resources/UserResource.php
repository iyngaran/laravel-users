<?php


namespace Iyngaran\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'email_verified_at' => $this->email_verified_at,
                'is_active' => $this->is_active,
                'company_name' => $this->company_name,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'mobile' => $this->mobile,
                'phone' => $this->phone,
                'profile_picture' => $this->profile->profile_picture,
                'website_address' => $this->profile->website_address,
                'social_media_links' => $this->profile->social_media_links,
                'location_lat' => $this->profile->location_lat,
                'location_lon' => $this->profile->location_lon,
                'extra_fields' => $this->profile->extra_fields,
                'roles' => $this->roles,
                'permissions' => $this->permissions,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
        ];
    }
}
