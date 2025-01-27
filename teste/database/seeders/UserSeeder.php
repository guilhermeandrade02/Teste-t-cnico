<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'Guilherme Teste 1',
            'email' => 'teste1@dominio.com.br',
            'password' => Hash::make('123'), 
        ]);

        User::create([
            'name' => 'Guilherme Teste 2',
            'email' => 'teste2@dominio.com.br',
            'password' => Hash::make('1234'), 
        ]);
    }
}
