<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use PhpParser\Builder\Class_;
use Tests\TestCase;

class ClassroomTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_classroom()
    {
        $response = $this->get('/api/classroom');

        $response->assertStatus(200);
    }

    public function test_store_classroom()
    {
        Grade::factory()->create();
        Teacher::factory()->create();

        $classroom = Classroom::factory()->create();

        $this->post('/api/classroom', $classroom->getRawOriginal())->assertStatus(201);
    }

    public function test_update_classroom()
    {
        Grade::factory()->create();
        Teacher::factory()->create();

        $classroom = Classroom::factory()->create();

        $update = [
            "year" => "2000",
            "id_grade" => 1,
            "status" => 1,
            "remarks" => "ini adalah deskripsi",
            "id_teacher" => 1
        ];

        $this->put("/api/classroom/$classroom->id_classroom", $update)->assertStatus(200);
    }

    public function test_delete_classroom()
    {
        Grade::factory()->create();
        Teacher::factory()->create();

        $classroom = Classroom::factory()->create();

        $this->delete("/api/classroom/$classroom->id_classroom")->assertStatus(200);
    }
}
