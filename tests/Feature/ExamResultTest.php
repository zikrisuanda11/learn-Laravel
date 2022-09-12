<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\ExamType;
use App\Models\Grade;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExamResultTest extends TestCase
{
    use WithFaker;
    use WithoutMiddleware;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_result()
    {
        $response = $this->get('/api/exam-result');

        $response->assertStatus(200);
    }

    public function test_post_result()
    {
        ExamType::factory()->create();
        Exam::factory()->create();
        Parents::factory()->create();
        Student::factory()->create();
        Grade::factory()->create();
        Teacher::factory()->create();
        Course::factory()->create();

        $examResult = ExamResult::factory()->create();

        $this->post('/api/exam-result', $examResult->getRawOriginal())->assertStatus(201);
    }

    public function test_update_result()
    {
        ExamType::factory()->create();
        Exam::factory()->create();
        Parents::factory()->create();
        Student::factory()->count(3)->create();
        Grade::factory()->create();
        Teacher::factory()->create();
        Course::factory()->create();

        $examResult = ExamResult::factory()->create();
        
        $update = [
            'id_exam' => 1,
            'id_student' => 2,
            'id_course' => 1,
            'marks' => 'tes',
        ];

        // $this->json('put', "/api/exam-result/$examResult->id_exam_result", $update)->assertStatus(200);
        $this->put("/api/exam-result/$examResult->id_exam_result", $update)->assertStatus(200);
    }

    public function test_delete_result()
    {
        ExamType::factory()->create();
        Exam::factory()->create();
        Parents::factory()->create();
        Student::factory()->create();
        Grade::factory()->create();
        Teacher::factory()->create();
        Course::factory()->create();

        $examResult = ExamResult::factory()->create();

        $this->delete("/api/exam-result/$examResult->id_exam_result")->assertStatus(200);
    }
}
