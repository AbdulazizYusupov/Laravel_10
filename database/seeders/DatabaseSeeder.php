<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

//        for ($i = 0; $i < 50; $i++) {
//            Post::create([
//                'title' => 'Title ' . $i,
//                'body' => 'Body ' . $i,
//            ]);
//        }
//
//        for ($l = 0; $l < 50; $l++) {
//            Car::create([
//                'model' => 'Car ' . $l,
//                'color' => 'Color ' . $l,
//                'price' => $l + 1000,
//            ]);
//        }
//        $routes = Route::getRoutes();
//
//        foreach ($routes as $route) {
//
//            $key = $route->getName();
//
//            if ($key && !str_starts_with($key, 'generated::') && $key !== 'storage.local') {
//                $name = ucfirst(str_replace('.', '-', $key));
//                Permission::create([
//                    'name' => $key,
//                    'guard_name' => $name,
//                ]);
//            }
//        }
//        $permissions = Permission::all()->pluck('id')->toArray();
//        foreach (Role::all() as $role) {
//            $role->permissions()->attach($permissions);
//        }
    }
}
