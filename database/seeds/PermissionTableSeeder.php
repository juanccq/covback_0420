<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [
            'super_manage',
            'reseller_manage',
            'users_manage',
            'invoice_manage',
            'setting_manage',
        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }

}
