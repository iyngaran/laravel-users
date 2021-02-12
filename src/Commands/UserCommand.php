<?php

namespace Iyngaran\User\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Http\FormRequest;
use Iyngaran\User\Actions\CreateAction;
use Iyngaran\User\DTO\UserData;
use Spatie\Permission\Models\Role;

class UserCommand extends Command
{
    public $signature = 'iynga:create-administrator';

    public $description = 'The command to create an administrator user account';

    public function handle()
    {
        $userRole = null;
        $name = $this->ask('What is the name of the administrator ?');
        $email = $this->ask('What is the email address ?');
        $userPassword = $this->_generatePassword();

        if (! $role = Role::where('name', 'Administrator')->first()) {
            $role = Role::create(['name' => 'Administrator']);
        }

        $userData = [
            'name' => $name,
            'email' => $email,
            'mobile' => "1234567890",
            'password' => $userPassword,
            'role_ids' => [
                $role->id,
            ],
        ];
        $request = new FormRequest();
        $request->replace($userData);
        $userData = UserData::formRequest($request);
        $user = (new CreateAction())->execute($userData);
        if ($user) {
            $this->info("\n");
            $this->info("The administrator account has been created successfully");
            $this->info("The password is : $userPassword");
            $this->info("\n");
        } else {
            $this->info("Please try again with valid data");
        }
    }

    private function _generatePassword($length = 12)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
            '0123456789-=!$';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
