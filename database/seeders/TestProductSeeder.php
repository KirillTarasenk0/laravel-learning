<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TestProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestProduct::factory()->count(50)->create();
    }
}
