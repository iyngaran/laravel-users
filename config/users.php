<?php

return [
    'url_prefix' => 'system',
    'model' => \Iyngaran\User\Tests\Models\User::class,
    'default_status' => 1, // is_active
    'default_role' => ['Guest'],
    'allow_users_to_register' => true,
    'registration_fields' => [
        'name' => 'required',
        'email' => 'required|email',
        'mobile',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'company_name'
    ],
];
