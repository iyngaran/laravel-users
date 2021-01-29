<?php

namespace Iyngaran\User;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iyngaran\User\User
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-users';
    }
}
