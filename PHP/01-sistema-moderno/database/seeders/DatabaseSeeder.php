<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Eduardo Paim',
            'email' => 'eduardo@teste.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Product::factory(20)->create();
    }
}
