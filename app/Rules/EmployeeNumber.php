<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Employee;
use App\Models\Office;

class EmployeeNumber implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $employee = Employee::find($value);
        if ($employee) {
            $office = Office::find($employee->officeCode);
            if ($office->city !== 'Tokyo') {
                $fail('Employee is not from Tokyo');
            }
        }
    }
}
