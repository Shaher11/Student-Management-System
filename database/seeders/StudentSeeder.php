<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();
        
        // ->each(function ($user) {
        //     $user->certificates()->saveMany(Certificate::factory( mt_rand(1,3) )
        //     ->make());
        // }) 
    }
}