<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Setting::truncate();

        Setting::flushEventListeners();

        $quantity = 10;

        factory(Setting::class, $quantity)->create();
    }

}
