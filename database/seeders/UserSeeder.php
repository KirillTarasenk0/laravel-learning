<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $userRoles = ['admin', 'editor', 'viewer'];
        $adminCount = 0;
        for ($i = 0; $i < 20; $i++) {
            foreach ($userRoles as $role) {
                if ($role === 'admin' && $adminCount >= 5) {
                    continue;
                }
                DB::table('users')->insert([
                    'user_role' => $role
                ]);
                if ($role === 'admin') {
                    $adminCount++;
                }
            }
        }
    }
}
