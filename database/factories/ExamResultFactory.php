<?php

namespace Database\Factories;

use App\Models\ExamResult;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamResult>
 */
class ExamResultFactory extends Factory
{
    protected $model = ExamResult::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_exam' => 1,
            'id_student' => 1,
            'id_course' => 1,
            'marks' => $this->faker->sentence(3),
        ];
    }
}
