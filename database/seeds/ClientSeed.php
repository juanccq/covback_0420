<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Client::truncate();

        Client::flushEventListeners();

        $quantity = 10;

        factory(Client::class, $quantity)->create();
    }

}
