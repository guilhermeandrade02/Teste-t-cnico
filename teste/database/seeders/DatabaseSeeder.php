<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CidadesSeeder::class);
        $this->call(MedicosSeeder::class);
        $this->call(PacientesSeeder::class);
        $this->call(ConsultasSeeder::class);
        $this->call(UserSeeder::class);
    }
}
