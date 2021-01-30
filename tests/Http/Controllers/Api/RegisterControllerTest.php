<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\User\Models\UserProfile;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;
use Spatie\Permission\Models\Role;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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
            'social_media_links' => json_encode([
                'facebook' => 'http://facebook.com',
                'google' => 'http://google.com',
            ])
        ];
        $response = $this->post('api/system/user/register',$userData);
        $response->assertStatus(201);
        $this->assertEquals(1, User::all()->count());
    }
}
