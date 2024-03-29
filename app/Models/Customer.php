<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customerNumber';
    public $timestamps = false;
    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employeeNumber', 'salesRepEmployeeNumber');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }
}
