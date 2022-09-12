<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Models\Grade;
use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use PhpParser\Builder\Class_;
use Tests\TestCase;

class ClassroomStudentTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_classroomStudent()
    {
        $response = $this->get('/api/classroom-student');

        $response->assertStatus(200);
    }

    public function test_store_classroomStudent()
    {
        Grade::factory()->create();
        Teacher::factory()->create();
        Classroom::factory()->create();
        Parents::factory()->create();
        Student::factory()->create();

        $classroomStudent = ClassroomStudent::factory()->create();

        $this->post('/api/classroom-student', $classroomStudent->getRawOriginal())->assertStatus(201);
    }

    public function test_update_clasroomStudent()
    {
        Grade::factory()->create();
        Teacher::factory()->create();
        Classroom::factory()->create();
        Parents::factory()->create();
        Student::factory()->count(2)->create();

        $classroomStudent = ClassroomStudent::factory()->create();

        $update = [
            'id_classroom' => 1,
            'id_student' => 2,
        ];

        $this->put("/api/classroom-student/$classroomStudent->id_classroom_student", $update)->assertStatus(200);
    }

    public function test_delete_classroomStudent()
    {
        Grade::factory()->create();
        Teacher::factory()->create();
        Classroom::factory()->create();
        Parents::factory()->create();
        Student::factory()->create();

        $classroomStudent = ClassroomStudent::factory()->create();

        $this->delete("/api/classroom-student/$classroomStudent->id_classroom_student")->assertStatus(200);
    }
}
