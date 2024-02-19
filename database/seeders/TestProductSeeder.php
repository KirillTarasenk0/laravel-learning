<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TestProduct;

class TestProductSeeder extends Seeder
{
    public function run(): void
    {
        TestProduct::factory()->count(50)->create();
    }
}
