<?php

use Illuminate\Database\Seeder;
use App\Medico;

class MedicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Medico::truncate();
        
        factory( Medico::class, 50 ) -> create();
    }
}
