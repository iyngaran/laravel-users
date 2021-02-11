<?php

namespace Iyngaran\User;

use Illuminate\Support\Facades\Route;
use Iyngaran\User\Commands\UserCommand;
use Iyngaran\User\Repositories\UserRepository;
use Iyngaran\User\Repositories\UserRepositoryInterface;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UserServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-users')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_users_table')
            ->hasCommand(UserCommand::class);

        $this->registerRepositories();
        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            [
                'prefix' => config('users.url_prefix', 'system')."/",
                'middleware' => "web",
                'namespace' => 'Iyngaran\User\Http\Controllers',
            ],
            function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            }
        );
    }

    private function registerApiRoutes()
    {
        Route::group(
            [
                'prefix' => "/api/".config('users.url_prefix', 'system'),
                'middleware' => "api",
                'namespace' => 'Iyngaran\User\Http\Controllers\Api',
            ],
            function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
            }
        );
    }

    private function registerRepositories()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
