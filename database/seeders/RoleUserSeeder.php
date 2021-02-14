<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = Role::all();
        //populate the pivot
        User::all()->each(function($user) use ($roles){
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });
        // Role::all()->each(function($user) use ($roles){
        //     $user->users()->attach(
        //         $roles->random(1)->pluck('id')
        //     );
        // });
    }
}
