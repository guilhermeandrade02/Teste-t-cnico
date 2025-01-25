<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultas; 
use Illuminate\Support\Facades\DB;

class ConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consulta::create([
            'medico_id' => 2,
            'paciente_id' => 1, 
            'data' => '2025-01-29 09:30:00',
        ]);
        Consulta::create([
            'medico_id' => 6,
            'paciente_id' => 2, 
            'data' => '2025-01-30 14:30:00',
        ]);
        Consulta::create([
            'medico_id' => 8,
            'paciente_id' => 3, 
            'data' => '2025-01-29 11:00:00',
        ]);
    }
}
