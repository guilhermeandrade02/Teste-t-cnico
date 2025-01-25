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
        Cidades::create([
            'nome' => 'Pelotas',
            'estado' => 'RS'
        ]);
        Cidades::create([
            'nome' => 'São Paulo',
            'estado' => 'SP'
        ]);
        Cidades::create([
            'nome' => 'Curitiba',
            'estado' => 'PR'
        ]);
        Cidades::create([
            'nome' => 'Rio de Janeiro',
            'estado' => 'RJ'
        ]);
        Cidades::create([
            'nome' => 'Belo Horizonte',
            'estado' => 'MG'
        ]);
    }
}
