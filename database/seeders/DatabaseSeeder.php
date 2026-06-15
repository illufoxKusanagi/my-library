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
        \App\Models\Role::create(['name' => 'admin']);
        \App\Models\Role::create(['name' => 'client']);

        \App\Models\User::create([
            'username' => 'admin',
            'email' => 'admin@library.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'status' => 'active'
        ]);

        $this->call(BookSeeder::class);
    }
}
