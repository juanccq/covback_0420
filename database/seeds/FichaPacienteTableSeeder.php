<?php

use Illuminate\Database\Seeder;
use App\FichaPaciente;

class FichaPacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        FichaPaciente::truncate();
        
        factory( FichaPaciente::class, 150 ) -> create();
    }
}
