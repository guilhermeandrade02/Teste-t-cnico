<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidades; 
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert([
            [
                'nome' => 'Pelotas', 
                'estado' => 'RS'
            ],
            [
                'nome' => 'São Paulo', 
                'estado' => 'SP'
            ],
            [
                'nome' => 'Curitiba', 
                'estado' => 'PR'
            ],
            [
                'nome' => 'Rio de Janeiro', 
                'estado' => 'RJ'
            ], 
            [
                'nome' => 'Belo Horizonte', 
                'estado' => 'MG'
            ],
        ]);
    }
}
