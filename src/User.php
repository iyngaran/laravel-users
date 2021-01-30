<?php

namespace Iyngaran\User;

class User
{

    public function urlPrefix()
    {
        return config('users.url_prefix', 'system');
    }

}
