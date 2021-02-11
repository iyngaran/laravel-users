<?php

namespace Iyngaran\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Iyngaran\User\Models\UserProfile;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    public function definition(): array
    {
        return [
            'profile_picture' => $this->faker->word . ".png",
            'website_address' => $this->faker->url,
            'social_media_links' => [
                'facebook' => $this->faker->url,
                'linkedIn' => $this->faker->url,
                'twitter' => $this->faker->url,
            ],
            'location_lat' => $this->faker->latitude,
            'location_lon' => $this->faker->longitude,
            'extra_fields' => [
                'age' => $this->faker->numberBetween(10, 50),
                'job' => $this->faker->jobTitle,
            ]
        ];
    }
}
