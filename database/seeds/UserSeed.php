<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('super');
        
        $user = User::create([
            'name' => 'Reseller',
            'email' => 'reseller@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('reseller');
        
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('admin');
        
        $user = User::create([
            'name' => 'Contador 1',
            'email' => 'contador1@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('contador');
        
        $user = User::create([
            'name' => 'Asiste 1',
            'email' => 'asistente1@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('asistente');
        
        $user = User::create([
            'name' => 'Asiste 2',
            'email' => 'asistente2@alisadomain.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('asistente');

    }
}
