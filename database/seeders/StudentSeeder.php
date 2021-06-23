<?php

namespace Database\Seeders;

use App\Models\Course;
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
       $user= Student::factory(10)->create()
        
        // $courses = Course::all();
        // $students = Student::all();

        // foreach ($students as $student) {
        //     foreach ($courses as $course) {
        //         $student->courses()->attach($course->id);
        //     }
        // }
        
        ->each(function ($user) {
            $user->courses()->saveMany(Course::factory( mt_rand(1,3) )
            ->make());
        }); 
    }
}