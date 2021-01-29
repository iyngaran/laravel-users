<?php

namespace Iyngaran\User;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Iyngaran\User\Commands\UserCommand;

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

        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            [
                'prefix' => "/",
                'middleware' => "web",
                'namespace' => 'Iyngaran\User\Http\Controllers'
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
                'prefix' => "/api",
                'middleware' => "api",
                'namespace' => 'Iyngaran\User\Http\Controllers\Api'
            ],
            function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
            }
        );
    }
}
