<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TestProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestProductFactory extends Factory
{
    protected $model = TestProduct::class;
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'name' => $faker->name(),
            'description' => $faker->text(),
            'price' => $faker->numberBetween(1, 100),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime()
        ];
    }
}
