<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $role = Role::create(['name' => 'super']);
        $role->givePermissionTo([
            'super_manage'
        ]);

        $role = Role::create(['name' => 'reseller']);
        $role->givePermissionTo([
            'reseller_manage'
        ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'admin_manage'
        ]);
        
        $role = Role::create(['name' => 'contador']);
        $role->givePermissionTo([
            'contador_manage'
        ]);

        $role = Role::create(['name' => 'asistente']);
        $role->givePermissionTo([
            'asistente_manage'
        ]);
    }

}
