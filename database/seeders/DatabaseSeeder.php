<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $user = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
         ]);
        $role = Role::create(['name' => 'Admin']);
        $user->assignRole($role);
    }
}
