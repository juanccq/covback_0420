<?php

use Illuminate\Database\Seeder;
use App\Paciente;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Paciente::truncate();
        
        factory( Paciente::class, 100 ) -> create();
    }
}
