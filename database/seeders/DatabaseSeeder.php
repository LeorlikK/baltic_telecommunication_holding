<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);
        $userRole = Role::create([
            'name' => 'user'
        ]);

        User::create([
            'name' => 'test_name_admin',
            'email' => 'testemailAdmin@yandex.ru',
            'password' => Hash::make('123'),
            'role_id' => $adminRole->id
        ]);
    }
}
