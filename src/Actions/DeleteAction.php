<?php


namespace Iyngaran\User\Actions;

class UpdateAction
{
    public function execute(array $attributes, int $userId)
    {
        $user = getUserModel()::find($userId);
         dd($user->getId());
    }
}
