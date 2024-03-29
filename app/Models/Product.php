<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'productCode';
    public $timestamps = false;
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'productCode', 'productCode');
    }
    public function productLines(): BelongsTo
    {
        return $this->belongsTo(ProductLine::class, 'productLine', 'productLine');
    }
    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
