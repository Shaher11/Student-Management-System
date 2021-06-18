<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);
        
        //////-- Here we can put any type users like 'super-admin, admin, manager etc.'  --//////
        
        // $super_admin = Role::create([
        //     'name' => 'super admin',
        // ]);
        
    }
}