<?php


namespace Iyngaran\User\Actions;

class DeleteAction
{
    public function execute($user)
    {
        return $user->delete();
    }
}
