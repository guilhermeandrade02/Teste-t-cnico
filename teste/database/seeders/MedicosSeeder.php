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
        DB::table('medicos')->insert([
            [
                'nome' => 'Maiara Heloísa Benites Sobrinho', 
                'especialidade' => 'Oftalmologia', 
                'cidade_id' => 1
            ],
            [
                'nome' => 'Cristina Ariane Grego', 
                'especialidade' => 'Neurologia', 
                'cidade_id' => 1
            ],
            [
                'nome' => 'Dener Allan Verdugo Jr.', 
                'especialidade' => 'Dermatologia', 
                'cidade_id' => 1
            ],
            [
                'nome' => 'Srta. Kelly Tatiane de Arruda', 
                'especialidade' => 'Oftalmologia', 
                'cidade_id' => 2
            ],
            [
                'nome' => 'Nayara Carvalho Neto', 
                'especialidade' => 'Neurologia', 
                'cidade_id' => 2
            ],
            [
                'nome' => 'Aurora Delgado', 
                'especialidade' => 'Dermatologia', 
                'cidade_id' => 2
            ],
            [
                'nome' => 'Juliane Ortega', 
                'especialidade' => 'Oftalmologia', 
                'cidade_id' => 3
            ],
            [
                'nome' => 'Dr. Milene Cristiana Ortiz Sobrinho', 
                'especialidade' => 'Neurologia', 
                'cidade_id' => 3
            ],
            [
                'nome' => 'Malu Malena Lozano', 
                'especialidade' => 'Dermatologia', 
                'cidade_id' => 3
            ],
            [
                'nome' => 'Otávio Yuri Delatorre', 
                'especialidade' => 'Oftalmologia', 
                'cidade_id' => 4
            ],
            [
                'nome' => 'Srta. Antonieta Daniella de Aguiar Filho', 
                'especialidade' => 'Neurologia', 
                'cidade_id' => 4
            ],
            [
                'nome' => 'Srta. Mariana Saraiva Sanches', 
                'especialidade' => 'Dermatologia', 
                'cidade_id' => 4
            ],
            [
                'nome' => 'Dayana Mônica Paz', 
                'especialidade' => 'Oftalmologia', 
                'cidade_id' => 5
            ],
            [
                'nome' => 'Dr. Renan Fidalgo Domingues', 
                'especialidade' => 'Neurologia', 
                'cidade_id' => 5
            ],
            [
                'nome' => 'Juliana Léia Neves Jr.', 
                'especialidade' => 'Dermatologia', 
                'cidade_id' => 5
            ],
        ]);
    }
}
