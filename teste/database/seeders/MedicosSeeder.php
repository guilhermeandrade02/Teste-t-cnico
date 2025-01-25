<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicos; 
use Illuminate\Support\Facades\DB;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medico::create([
            'nome' => 'Maiara Heloísa Benites Sobrinho', 
            'especialidade' => 'Oftalmologia', 
            'cidade_id' => 1
        ]);
        Medico::create([
            'nome' => 'Cristina Ariane Grego', 
            'especialidade' => 'Neurologia', 
            'cidade_id' => 1
        ]);
        Medico::create([
            'nome' => 'Dener Allan Verdugo Jr.', 
            'especialidade' => 'Dermatologia', 
            'cidade_id' => 1
        ]);
        Medico::create([
            'nome' => 'Srta. Kelly Tatiane de Arruda', 
            'especialidade' => 'Oftalmologia', 
            'cidade_id' => 2
        ]);
        Medico::create([
            'nome' => 'Nayara Carvalho Neto', 
            'especialidade' => 'Neurologia', 
            'cidade_id' => 2
        ]);
        Medico::create([
            'nome' => 'Aurora Delgado', 
            'especialidade' => 'Dermatologia', 
            'cidade_id' => 2
        ]);
        Medico::create([
            'nome' => 'Juliane Ortega', 
            'especialidade' => 'Oftalmologia', 
            'cidade_id' => 3
        ]);
        Medico::create([
            'nome' => 'Dr. Milene Cristiana Ortiz Sobrinho', 
            'especialidade' => 'Neurologia', 
            'cidade_id' => 3
        ]);
        Medico::create([
            'nome' => 'Malu Malena Lozano', 
            'especialidade' => 'Dermatologia', 
            'cidade_id' => 3
        ]);
        Medico::create([
            'nome' => 'Otávio Yuri Delatorre', 
            'especialidade' => 'Oftalmologia', 
            'cidade_id' => 4
        ]);
        Medico::create([
            'nome' => 'Srta. Antonieta Daniella de Aguiar Filho', 
            'especialidade' => 'Neurologia', 
            'cidade_id' => 4
        ]);
        Medico::create([
            'nome' => 'Srta. Mariana Saraiva Sanches', 
            'especialidade' => 'Dermatologia', 
            'cidade_id' => 4
        ]);
        Medico::create([
            'nome' => 'Dayana Mônica Paz', 
            'especialidade' => 'Oftalmologia', 
            'cidade_id' => 5
        ]);
        Medico::create([
            'nome' => 'Dr. Renan Fidalgo Domingues', 
            'especialidade' => 'Neurologia', 
            'cidade_id' => 5
        ]);
        Medico::create([
            'nome' => 'Juliana Léia Neves Jr.', 
            'especialidade' => 'Dermatologia', 
            'cidade_id' => 5
        ]);
    }
}
