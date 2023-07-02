<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('12345'),
        ]);
        \App\Models\Setting::create([
            'title' => 'This is site title'
        ]);

        \Facades\Spatie\Permission\Models\Role::create([
            'name' => 'Admin'
        ]);
        \Facades\Spatie\Permission\Models\Role::create([
            'name' => 'Member'
        ]);

        $user=User::first();
        $user->assignRole('Admin');

        $role=\Facades\Spatie\Permission\Models\Role::findByName('Admin');

        // Get all route names from admin.php
        $routes = collect(Route::getRoutes()->getRoutesByName())
        ->filter(function ($route) {
            return strpos($route->uri, 'admin') !== false;
        })
        ->keys();

        // Output the route names
        $data=[];
        foreach ($routes as $routeName) {
            $data['name']=$routeName;
            $permission=\Facades\Spatie\Permission\Models\Permission::create($data);
        }
        $role->givePermissionTo(\Facades\Spatie\Permission\Models\Permission::all());
    }
}
