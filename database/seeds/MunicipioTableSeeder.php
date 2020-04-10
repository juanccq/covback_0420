<?php

use Illuminate\Database\Seeder;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'municipios' ) -> delete();
        DB::table( 'municipios' ) -> insert([
            [
                'id'                    => 1,
                'numero_departamento'   => 1,
                'departamento'          => 'Beni',
                'provincia'             => 'Beni',
                'numero_municipio'      => 1,
                'municipio'             => 'Beni',
                'circunscripccion'      => 'Beni',
                'localidad'             => 'Beni',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id'                    => 2,
                'numero_departamento'   => 2,
                'departamento'          => 'Cochabamba',
                'provincia'             => 'Cochabamba',
                'numero_municipio'      => 2,
                'municipio'             => 'Cochabamba',
                'circunscripccion'      => 'Cochabamba',
                'localidad'             => 'Cochabamba',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id'                    => 3,
                'numero_departamento'   => 3,
                'departamento'          => 'Santa Cruz',
                'provincia'             => 'Santa Cruz',
                'numero_municipio'      => 3,
                'municipio'             => 'Santa Cruz',
                'circunscripccion'      => 'Santa Cruz',
                'localidad'             => 'Santa Cruz',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id'                    => 4,
                'numero_departamento'   => 4,
                'departamento'          => 'Oruro',
                'provincia'             => 'Oruro',
                'numero_municipio'      => 4,
                'municipio'             => 'Oruro',
                'circunscripccion'      => 'Oruro',
                'localidad'             => 'Oruro',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
