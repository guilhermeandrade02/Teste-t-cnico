<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pacientes; 
use Illuminate\Support\Facades\DB;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paciente::create([
            'nome' => 'Luana Rodrigues',
            'cpf' => '662.669.840-08',
            'celular' => '(11) 9 8484-6363',
        ]);
        Paciente::create([
            'nome' => 'Luiza Gonçalves',
            'cpf' => '491.075.050-94',
            'celular' => '(11) 9 8123-4567',
        ]);
        Paciente::create([
            'nome' => 'Raul da Costa',
            'cpf' => '323.962.920-80',
            'celular' => '(11) 9 9876-5432',
        ]);
    }
}
