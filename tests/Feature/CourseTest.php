<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use WithFaker;
    use WithoutMiddleware;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_course()
    {
        $response = $this->get('/api/course');

        $response->assertStatus(200);
    }

    public function test_store_course()
    {
        Grade::factory()->create();
        Teacher::factory()->create();

        $course = Course::factory()->create();

        $this->post('/api/course', $course->getRawOriginal())->assertStatus(201);
    }

    public function test_update_course()
    {
        Grade::factory()->create();
        Teacher::factory()->create();
        $course = Course::factory()->create();

        $update = [
            'id_grade' => 1,
            'id_teacher' => 1,
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(4),
        ];

        $this->put("/api/course/$course->id_course", $update)->assertStatus(200);
    }

    public function test_delete()
    {
        Grade::factory()->create();
        Teacher::factory()->create();
        $course = Course::factory()->create();
        
        $this->delete("/api/course/$course->id_course")->assertStatus(200);
    }
}
