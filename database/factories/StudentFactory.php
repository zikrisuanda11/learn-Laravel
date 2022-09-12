<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_parent" => 1,
            "email" => $this->faker->email(),
            "password" => $this->faker->password(),
            "fname" => $this->faker->firstName(),
            "lname" => $this->faker->lastName(),
            "date_of_birth" => $this->faker->date(),
            "phone" => $this->faker->phoneNumber(),
        ];
    }
}
