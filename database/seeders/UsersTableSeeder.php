<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Usuário 1',
            'email' => 'usuario1@email.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Usuário 2',
            'email' => 'usuario2@email.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Usuário 3',
            'email' => 'christian.ramires@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
