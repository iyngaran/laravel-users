<?php

namespace Iyngaran\User\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Iyngaran\User\UserServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Laravel\Sanctum\SanctumServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn(string $modelName) => 'Iyngaran\\User\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            UserServiceProvider::class,
            PermissionServiceProvider::class,
            SanctumServiceProvider::class
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        $app['config']->set('auth.defaults.guard', 'api');

        include_once __DIR__.'/../database/migrations/create_laravel_users_table.php.stub';
        (new \CreateLaravelUsersTable())->up();
        include_once __DIR__.'/../vendor/spatie/laravel-permission/database/migrations/create_permission_tables.php.stub';
        (new \CreatePermissionTables())->up();
    }
}
