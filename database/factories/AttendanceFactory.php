<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = collect([
            'hadir',
            'sakit',
            'alpa'
        ]);

        return [
            'date' => $this->faker->date(),
            'id_student' => 1,
            'status' => $status->random(),
            'remark' => $this->faker->paragraph()
        ];
    }
}
