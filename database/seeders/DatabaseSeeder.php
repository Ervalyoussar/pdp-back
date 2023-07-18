<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->delete();
        DB::table('roles')->delete();

        // Create roles beforehand
        foreach (['admin', 'user'] as $role)
        {
            DB::table('roles')->insert(['name' => $role]);
        }

        DB::table('users')->insert([
            'name'     => 'admin',
            'email'    => 'admin@ervalyoussar.fr',
            'password' => Hash::make('admin'),
            'role_id'  => Role::where('name', 'admin')->first()->id,
        ]);

    }
}
