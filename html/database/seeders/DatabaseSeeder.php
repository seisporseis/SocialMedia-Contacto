<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::insert([
            'name' => "raul",
            'email' => "raul@luar.com",
            'password' => '$2y$10$WXyYfj2PdcMpcNy.r0HOiuv3dT7d1.xjrM1bhko0KcVdWQn.fQ6MW',
        ]);

        \App\Models\User::insert([
            'name' => "raul",
            'email' => "raul@luar.com",
            'password' => '$2y$10$WXyYfj2PdcMpcNy.r0HOiuv3dT7d1.xjrM1bhko0KcVdWQn.fQ6MW',
        ]);
    }
}
