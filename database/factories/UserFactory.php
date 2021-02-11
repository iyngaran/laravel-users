<?php

namespace Iyngaran\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Iyngaran\User\Tests\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => 'password!',
            'remember_token' => Str::random(10),
        ];
    }

    public function activated(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => 1,
            ];
        });
    }

    public function deActivated(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => 0,
            ];
        });
    }
}
