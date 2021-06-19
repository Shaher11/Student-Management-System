<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'level_id' => Level::inRandomOrder()->first()->id,
            'program_id' => Program::inRandomOrder()->first()->id,
            
            'identifier' => $this->faker->numerify('######'),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthdate' => $this->faker->dateTimeBetween('-20 Years','-6 Years'),
            // 'gender' => $gender,
        ];
    }
}