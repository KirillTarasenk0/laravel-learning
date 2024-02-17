<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $primaryKey = 'orderNumber';
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'customerNumber','customerNumber');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productCode', 'productCode');
    }
}
