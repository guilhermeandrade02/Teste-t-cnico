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
        DB::table('consultas')->insert([
            [
                'medico_id' => 2,
                'paciente_id' => 1, 
                'data' => '2025-01-29 09:30:00',
                'created_at' => '2025-01-24 18:00:00',
                'updated_at' => '2025-01-24 18:00:00'
            ],
            [
                'medico_id' =>6,
                'paciente_id' => 2, 
                'data' => '2025-01-30 14:30:00',
                'created_at' => '2025-01-24 18:00:00',
                'updated_at' => '2025-01-24 18:00:00'
            ],
            [
                'medico_id' => 8,
                'paciente_id' => 3, 
                'data' => '2025-01-29 11:00:00',
                'created_at' => '2025-01-24 18:00:00',
                'updated_at' => '2025-01-24 18:00:00'
            ]
        ]);
    }
}
