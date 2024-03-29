<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'customerNumber';
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customerNumber', 'customerNumber');
    }
}
