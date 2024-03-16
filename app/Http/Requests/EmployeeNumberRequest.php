<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\EmployeeNumber;

class EmployeeNumberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'employeeNumber' => ['required', 'exists:employees', new EmployeeNumber()]
        ];
    }
}
