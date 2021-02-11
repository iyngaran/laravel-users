<?php


namespace Iyngaran\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return config('users.allow_users_to_register');
    }

    public function rules()
    {
        return config('users.registration_fields');
    }
}
