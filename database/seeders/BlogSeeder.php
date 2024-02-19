<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('blogs')->count() > 100) {
            DB::table('blogs')->truncate();
            Blog::factory()->count(100)->create();
        }
    }
}
