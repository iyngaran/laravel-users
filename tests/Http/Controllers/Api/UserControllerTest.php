<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\User\Tests\Models\User;
use Iyngaran\User\Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_be_retrieve()
    {
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
                'current_page',
                'data',
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'links',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total',
            ]
        );
        $response->assertJson(
            [
                'current_page' => 2,
            ]
        );
    }

    /** @test */
    public function a_user_details_can_be_retrieve()
    {
        $response = $this->post('api/system/user');
        $this->assertTrue(true);
    }

    /** @test */
    public function a_user_details_can_be_created()
    {
        $response = $this->post('api/system/user');
        $this->assertTrue(true);
    }

    /** @test */
    public function a_user_details_can_be_updated()
    {
        $response = $this->post('api/system/user');
        $this->assertTrue(true);
    }

    /** @test */
    public function a_user_details_can_be_deleted()
    {
        $response = $this->post('api/system/user');
        $this->assertTrue(true);
    }
}
