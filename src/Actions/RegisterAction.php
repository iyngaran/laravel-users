<?php


namespace Iyngaran\User\Actions;

use Iyngaran\User\DTO\UserData;

class RegisterAction
{
    public function execute(UserData $data)
    {
        return (new CreateAction())->execute($data);
    }
}
