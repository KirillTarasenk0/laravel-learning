<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'employeeNumber';
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'salesRepEmployeeNumber');
    }
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'officeCode');
    }
}
