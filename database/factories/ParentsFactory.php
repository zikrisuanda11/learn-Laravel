<?php

namespace Database\Factories;

use App\Models\Parents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    protected $model = Parents::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "email" => $this->faker->email(),
            "password" => $this->faker->password(),
            "fname" => $this->faker->firstName(),
            "lname" => $this->faker->lastName(),
            "date_of_birth" => $this->faker->date(),
            "phone" => $this->faker->phoneNumber(),
        ];
    }
}
