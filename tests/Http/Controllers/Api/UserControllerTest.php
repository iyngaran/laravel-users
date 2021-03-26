<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Iyngaran\User\Models\UserProfile;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->login();
    }


    /** @test */
    public function user_details_can_be_retrieve_by_email()
    {
        $this->withoutExceptionHandling();
        User::factory()
            ->count(35)
            ->state(new Sequence(
                ['is_active' => 1],
                ['is_active' => 0],
            ))
            ->create();

        $user = User::first();
        $response = $this->get('api/system/user?email='.$user->email);
        $response->assertStatus(200);

    }

}
