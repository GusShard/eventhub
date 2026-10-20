<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Utilizador Administrador
        User::updateOrCreate(
            ['email' => 'admin@eventhub.test'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => true,
            ]
        );

        // Utilizador Comum de Demonstração
        User::updateOrCreate(
            ['email' => 'usuario@eventhub.test'],
            [
                'name' => 'Usuário Demonstração',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => true,
            ]
        );

        // Chamada dos outros Seeders
        $this->call([
            CategorySeeder::class,
            EventSeeder::class,
        ]);
    }
}
