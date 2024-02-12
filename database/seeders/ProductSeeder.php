<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductLine;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductLine::factory()
            ->count(3)
            ->create()
            ->each(function () {
                Product::factory()
                    ->count(rand(5, 10))
                    ->create();
            });
    }
}
