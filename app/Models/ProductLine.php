<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ProductLineFactory;

class ProductLine extends Model
{
    use HasFactory;
    protected $table = 'productlines';
    protected $primaryKey = 'productLine';
    public $timestamps = false;
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'productLine');
    }
    public static function newFactory(): Factory
    {
        return ProductLineFactory::new();
    }
}
