<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => rtrim( ucfirst($this->faker->text(20)), '.'),
            'code' => $this->faker->numerify('#####'), 
            'description' => $this->faker->sentence(), 
        ];
    }
}