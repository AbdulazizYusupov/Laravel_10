<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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

        $user1 = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456789),
        ]);
        $user2 = User::create([
            'name' => 'car',
            'email' => 'car@gmail.com',
            'password' => Hash::make(123456789),
        ]);
        $user3 = User::create([
            'name' => 'post',
            'email' => 'post@gmail.com',
            'password' => Hash::make(123456789),
        ]);
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'car']);
        $role3 = Role::create(['name' => 'post']);

        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'title' => 'Title ' . $i,
                'body' => 'Body ' . $i,
            ]);
        }

        for ($l = 0; $l < 50; $l++) {
            Car::create([
                'model' => 'Car ' . $l,
                'color' => 'Color ' . $l,
                'price' => $l + 1000,
            ]);
        }
        $routes = Route::getRoutes();

        foreach ($routes as $route) {

            $key = $route->getName();

            if ($key && !str_starts_with($key, 'generated::') && $key !== 'storage.local') {
                $name = ucfirst(str_replace('.', '-', $key));
                $permission = Permission::create([
                    'name' => $key,
                ]);
                $role1->givePermissionTo($permission);
                $role2->givePermissionTo($permission);
                $role3->givePermissionTo($permission);
            }
        }
        $user1->assignRole($role1);
        $user2->assignRole($role2);
        $user3->assignRole($role3);
    }
}
