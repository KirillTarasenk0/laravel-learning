<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TestProductFactory;

class TestProduct extends Model
{
    use HasFactory;
    protected $table = 'test_products';
    protected static function newFactory(): Factory
    {
        return TestProductFactory::new();
    }
}
