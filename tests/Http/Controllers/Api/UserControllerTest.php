<?php


namespace Iyngaran\User\Tests\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\User\Tests\TestCase;

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
