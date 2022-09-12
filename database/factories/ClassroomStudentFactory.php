<?php

namespace Database\Factories;

use App\Models\ClassroomStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassroomStudent>
 */
class ClassroomStudentFactory extends Factory
{
    protected $model = ClassroomStudent::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_classroom' => 1,
            'id_student' => 1,
        ];
    }
}
