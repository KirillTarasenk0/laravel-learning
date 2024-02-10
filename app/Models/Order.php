<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'orderNumber';
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'customerNumber');
    }
    public function orderDetails(): BelongsTo
    {
        return $this->belongsTo(OrderDetail::class, 'customerNumber');
    }
}
