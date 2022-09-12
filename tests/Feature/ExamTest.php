<?php

namespace Tests\Feature;

use App\Models\Exam;
use App\Models\ExamType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExamTest extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_exam()
    {
        $response = $this->get('/api/exam');

        $response->assertStatus(200);
    }

    public function test_store_exam()
    {
        ExamType::factory()->create();
        $exam = Exam::factory()->create();

        $this->post('/api/exam', $exam->getRawOriginal())->assertStatus(201);
    }

    public function test_update_exam()
    {
        ExamType::factory()->create();
        $exam = Exam::factory()->create();

        $update = [
            'id_exam_type' => 1,
            'name' => $this->faker->name(),
            'start_date' => $this->faker->date(),
        ];

        $this->put("/api/exam/$exam->id_exam", $update)->assertStatus(200);
    }

    public function test_delete_exam()
    {
        ExamType::factory()->create();
        $exam = Exam::factory()->create();

        $this->delete("/api/exam/$exam->id_exam")->assertStatus(200);
    }
}
