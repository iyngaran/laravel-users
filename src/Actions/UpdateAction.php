<?php


namespace Iyngaran\User\Actions;

class UpdateAction
{
    public function execute(array $attributes, $user)
    {
        dd($user->getId());
    }
}
