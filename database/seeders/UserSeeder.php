<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //////-- Here we can put many users by changing 1 To any number we want'  --//////
        
        User::factory(1)->create(); //
        
    }
}