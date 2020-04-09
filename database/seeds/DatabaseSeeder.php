<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('TRUNCATE roles;');
        DB::statement('TRUNCATE users;');
        DB::statement('TRUNCATE permissions;');
        DB::statement('TRUNCATE model_has_roles;');
        DB::statement('TRUNCATE model_has_permissions;');
        DB::statement('TRUNCATE role_has_permissions;');
        // $this->call(UsersTableSeeder::class);
	$this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(ClientSeed::class);
        DB::statement("UPDATE users SET client_id=(SELECT id FROM clients WHERE email='admin@alisadomain.com' LIMIT 1) WHERE id IN (4,5,6);");
        $this->call(PaymentSeed::class);
//        
        $this->call(SettingSeed::class);
        $this->call(InvoiceSeed::class);
        $this->call(InvoiceItemSeed::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
