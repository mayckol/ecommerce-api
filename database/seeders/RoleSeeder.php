<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('roles')->truncate();
        DB::table('roles')->updateOrInsert([
            'id' => config('role.adm'),
            'type' => 'ADM',
        ]);
        DB::table('roles')->updateOrInsert([
            'id' => config('role.client'),
            'type' => 'CLIENT',
        ]);
    }
}
