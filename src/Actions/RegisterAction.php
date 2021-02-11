<?php


namespace Iyngaran\User\Actions;

class RegisterAction
{
    public function execute(array $attributes)
    {
        $attributes['roles'] = config('users.default_roles', ['Guest']);

        return (new CreateAction())->execute($attributes);
    }
}
