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
        \App\Models\Setting::create([
            'title' => 'This is site title'
        ]);

        \Facades\Spatie\Permission\Models\Role::create([
            'name' => 'admin'
        ]);
        \Facades\Spatie\Permission\Models\Role::create([
            'name' => 'member'
        ]);
    }
}
