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
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_login()
    {
        User::create([
            'name' => 'Iyngaran',
            'email' => 'dev@iyngaran.info',
            'mobile'=> '972983792739',
            'password' => 'password!',
        ]);
        $userData = [
            'email' => 'dev@iyngaran.info',
            'password' => 'password!',
            'device_name' => 'web'
        ];
        $response = $this->post('api/system/user/login',$userData);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'user',
                'token'
            ]
        );
    }
}
