<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;
use Spatie\Permission\Models\Role;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function a_user_can_register()
    {
        Role::create(['name' => 'Guest']);
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'mobile' => $this->faker->phoneNumber,
            'password' => 'password!',
            'password_confirmation' => 'password!',
        ];
        $response = $this->post('api/system/register', $userData);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'data' => [
                'profile_picture',
                'roles',
            ],
        ]);
        $this->assertEquals(1, User::all()->count());
        $this->assertTrue(User::get()->first()->roles->contains('name', 'Guest'));
    }
}
