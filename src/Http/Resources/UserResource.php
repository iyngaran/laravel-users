<?php


namespace Iyngaran\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
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
            'profile_picture' => $this->profile->profile_picture ?? null,
            'website_address' => $this->profile->website_address ?? null,
            'social_media_links' => $this->profile->social_media_links ?? null,
            'location_lat' => $this->profile->location_lat ?? null,
            'location_lon' => $this->profile->location_lon ?? null,
            'extra_fields' => $this->profile->extra_fields ?? null,
            'roles' => $this->roles ?? null,
            'permissions' => $this->permissions ?? null,
            'created_at' => $this->created_at ?? null,
            'updated_at' => $this->updated_at ?? null,
        ];
    }
}
