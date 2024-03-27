<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'userName' => ['required', 'string', 'max:25'],
            'userEmail' => ['required', 'string', 'email', 'max:75'],
            'userPassword' => ['required', 'string', 'min:8']
        ];
    }
}
