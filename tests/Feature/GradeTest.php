<?php

namespace Tests\Feature;

use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_grade()
    {
        $response = $this->get('/api/grade');

        $response->assertStatus(200);
    }

    public function test_store_grade()
    {
        $grade = Grade::factory()->create();

        $this->post('/api/grade', $grade->getRawOriginal())->assertStatus(201);
    }

    public function test_update_grade()
    {
        $grade = Grade::factory()->create();

        $update = [
            'name' => 'kelas 10',
            'description' => "anjay"
        ];

        $this->put("/api/grade/$grade->id_grade", $update)->assertStatus(200);
    }

    public function test_delete_grade()
    {
        $grade = Grade::factory()->create();

        $this->delete("/api/grade/$grade->id_grade")->assertStatus(200);
    }
}
