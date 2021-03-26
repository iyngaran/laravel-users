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
<<<<<<< HEAD
    public function user_details_can_be_retrieve_by_email()
=======
    public function users_can_be_retrieve()
    {
        $this->withoutExceptionHandling();
        User::factory()
            ->count(35)
            ->state(new Sequence(
                ['is_active' => 1],
                ['is_active' => 0],
            ))
            ->create();

        $response = $this->get('api/system/user?page=2&order-by=name&order-in=ASC');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links',
                    'per_page',
                    'to',
                    'total',
                    'path',
                ],
            ]
        );

        $response->assertJson(
            [
                'meta' => [
                    'current_page' => 2,
                    'per_page' => 5,
                    'to' => 10,
                    'total' => 36,
                ],
            ]
        );
    }

    /** @test */
    public function a_user_can_be_retrieve()
    {
        $role = Role::create(['name' => $this->faker->word]);
        $user = User::factory()
            ->hasAttached($role)
            ->state(new Sequence(
                ['is_active' => 1],
                ['is_active' => 0],
            ))
            ->create();

        $response = $this->get('api/system/user/'.$user->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'id',
                'name',
                'email',
                'is_active',
                'company_name',
                'address',
                'city',
                'state',
                'country',
                'mobile',
                'phone',
                'profile_picture',
                'website_address',
                'social_media_links',
                'roles',
                'permissions',
            ]
        );

        $response->assertJson(
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'is_active' => $user->is_active,
                'company_name' => $user->company_name,
                'address' => $user->address,
                'city' => $user->city,
                'state' => $user->state,
                'country' => $user->country,
                'mobile' => $user->mobile,
                'phone' => $user->phone,
                'profile_picture' => $user->profile->profile_picture,
                'website_address' => $user->profile->website_address,
                'social_media_links' => $user->profile->social_media_links,
            ]
        );
    }

    /** @test */
    public function a_user_can_be_created()
    {
        $total_users = User::all()->count();
        $response = $this->post('api/system/user', $this->mockUserData());
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'profile_picture',
            'roles',
        ]);
        $this->assertEquals($total_users + 1, User::all()->count());
    }

    /** @test */
    public function a_user_can_be_updated()
    {
        $user = User::factory()
            ->activated()
            ->hasAttached(Role::create(['name' => 'IT Manager']))
            ->create();

        $response = $this->put('api/system/user/'.$user->id, $this->mockUserData());
        $response->assertJsonStructure([
            'profile_picture',
            'roles',
        ]);
        $this->assertTrue(true);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $user = User::factory()
            ->activated()
            ->hasAttached(Role::create(['name' => 'Guest']))
            ->create();
        $total_users = User::all()->count();
        $response = $this->delete('api/system/user/'.$user->id);
        $this->assertEquals(($total_users - 1), User::all()->count());
        //$this->assertEquals(0, UserProfile::all()->count());
        $response->assertStatus(204);
    }

    /** @test */
    public function users_can_be_search()
>>>>>>> 902a16f30c57fc33bc981ec8227098e7e509efe2
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
<<<<<<< HEAD

=======
        $response->assertJsonStructure(
            [
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links',
                    'per_page',
                    'to',
                    'total',
                    'path',
                ],
            ]
        );

        $response->assertJson(
            [
                'meta' => [
                    'current_page' => 1,
                    'per_page' => 5,
                    'to' => 1,
                    'total' => 1,
                ],
            ]
        );
>>>>>>> 902a16f30c57fc33bc981ec8227098e7e509efe2
    }

}
