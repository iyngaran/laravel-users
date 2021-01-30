<?php

namespace Iyngaran\User\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Iyngaran\User\Models\UserProfile;
use Iyngaran\User\Tests\Models\User;
use Spatie\Permission\Models\Role;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function true_is_true()
    {
        $role = Role::create(['name' => 'writer']);
        $user = User::create([
            'name' => 'Iyngaran',
            'email' => 'iyngaran55@yahoo.com',
            'password' => 'iyngarani',
            'company_name' => 'SAS',
            'address' => '25, 1/4 Chapel Lane',
            'city' => 'Wellawatte',
            'state' => 'Colombo',
            'country' => 'Sri Lanka',
            'mobile' => '0711122288',
            'phone' => '011 2 456 880',
        ])->assignRole($role);

        $userProfile = new UserProfile(
            [
                'profile_picture' => 'test.png',
                'website_address' => 'http://www.google.com',
                'social_media_links' => json_encode([
                    'fb' => "http://facebook.com",
                ]),
                'location_lat' => '9.233333',
                'location_lon' => '3.20000',
            ]
        );
        $userProfile->user()->associate($user)->save();
        $this->assertEquals(1, User::count());
    }
}
