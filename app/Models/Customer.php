<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customerNumber';
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'reportsTo');
    }
    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'customerNumber');
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'customerNumber');
    }
}
