<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Permission::create(['name' => 'super_manage']);
        Permission::create(['name' => 'reseller_manage']);
        Permission::create(['name' => 'admin_manage']);
        Permission::create(['name' => 'contador_manage']);
        Permission::create(['name' => 'asistente_manage']);
    }

}
