<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\User\Models\UserProfile;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;
use Spatie\Permission\Models\Role;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->activated()->create();

        $response = $this->post(
            'api/system/login',
            [
                'email' => $user->email,
                'password' => 'password!',
                'device_name' => 'web',
            ]
        );
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'data' => [
                    'user',
                    'token',
                ]
            ]
        );
    }

    /** @test */
    public function a_guest_user_can_login()
    {
        $user = User::factory()
            ->activated()
            ->hasAttached(Role::create(['name' => 'Guest']))
            ->create();

        $response = $this->post(
            'api/system/login',
            [
                'email' => $user->email,
                'password' => 'password!',
                'device_name' => 'web',
            ]
        );
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'data' => [
                    'user',
                    'token',
                ]
            ]
        );
    }

    /** @test */
    public function a_user_can_not_login_with_invalid_password()
    {
        $user = User::factory()
            ->activated()
            ->create();

        $response = $this->post(
            'api/system/login',
            [
                'email' => $user->email,
                'password' => 'Password!',
                'device_name' => 'web',
            ]
        );
        $response->assertStatus(401);
        $response->assertJson(
            [
                'errors' => [
                    'password' => ['Invalid Password'],
                ],
            ]
        );
    }

    /** @test */
    public function a_deactivated_user_can_not_login()
    {
        $user = User::factory()->deActivated()->create();

        $response = $this->post(
            'api/system/login',
            [
                'email' => $user->email,
                'password' => 'Password!',
                'device_name' => 'web',
            ]
        );
        $response->assertStatus(401);
        $response->assertJson(
            [
                'errors' => [
                    'is_active' => ['The user account is deactivated'],
                ],
            ]
        );
    }
}
