<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\User\Models\UserProfile;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;
use Spatie\Permission\Models\Role;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function true_is_true()
    {
        $response = $this->post('api/system/user');
        $this->assertTrue(true);
    }
}
