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
        //Manually Insert
        DB::table('roles')->insert([
            'name'=>'Admin'
        ]);
        DB::table('roles')->insert([
            'name'=>'Author'
        ]);
        DB::table('roles')->insert([
            'name'=>'User'
        ]);
    }
}
