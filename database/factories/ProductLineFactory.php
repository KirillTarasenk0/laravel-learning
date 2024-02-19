<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductLine;
use Faker\Factory as Faker;

class ProductLineFactory extends Factory
{
    protected $model = ProductLine::class;
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'productLine' => $faker->unique()->text(20),
            'textDescription' => $faker->text()
        ];
    }
}
