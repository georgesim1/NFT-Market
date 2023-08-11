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

        \App\Models\User::factory()->create([
            'name' => 'Olivia',
            'email' => 'admin@admin.com',
            'usertype' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'George',
            'email' => 'example@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bob',
            'email' => 'test2@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Joseph',
            'email' => 'test3@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Michael',
            'email' => 'test4@example.com',
        ]);
        $this->call([
            NftSeeder::class,
        ]);
    }
}
