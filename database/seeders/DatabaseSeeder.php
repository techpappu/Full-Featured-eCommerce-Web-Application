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
        $user->profile()->create(['first_name'=>'Admin']);
        $user->assignRole('Admin');

        $role=\Facades\Spatie\Permission\Models\Role::findByName('Admin');

        // Get All Route of admin.php name make as Permission and attach to admin
        $routes = Route::getRoutes();
        $adminRoutes = [];
    
        foreach ($routes as $route) {
            if (strpos($route->getName(), "admin") !== false ) {
                $adminRoutes[] = $route;
            }
        }
    
        $adminRouteNames = [];
        foreach ($adminRoutes as $route) {
            $adminRouteNames['name'] = $route->getName();
            \Facades\Spatie\Permission\Models\Permission::create($adminRouteNames);
        }
        
        $role->givePermissionTo(\Facades\Spatie\Permission\Models\Permission::all());
    }
}
