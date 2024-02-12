<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'productCode' => $faker->unique()->text(10),
            'productName' => $faker->text(20),
            'productScale' => '1.10',
            'productVendor' => $faker->name(),
            'productDescription' => $faker->text(),
            'quantityInStock' => $faker->numberBetween(1, 100),
            'buyPrice' => $faker->numberBetween(1, 100),
            'MSRP' => $faker->numberBetween(1, 100)
        ];
    }
}
