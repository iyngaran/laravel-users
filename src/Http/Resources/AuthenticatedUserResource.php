<?php


namespace Iyngaran\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedUserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'data' => [
                'user' => new UserResource($this['user']),
                'token' => $this['token'],
            ],
        ];
    }
}
