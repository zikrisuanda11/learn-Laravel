<?php

namespace Tests\Feature;

use App\Models\ExamType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExamTypeFactory extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_examtype()
    {
        $response = $this->get('/api/exam-type');

        $response->assertStatus(200);
    }

    public function test_store_examtype()
    {
        $examtype = ExamType::factory()->create();

        $this->post('/api/exam-type', $examtype->getRawOriginal())->assertStatus(200);
    }

    public function test_update_examtype()
    {
        $examtype = ExamType::factory()->create();

        $update = [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(3),
        ];

        $this->put("/api/exam-type/$examtype->id_exam_type", $update)->assertStatus(200);
    }

    public function test_delete_examtype()
    {
        $examtype = ExamType::factory()->create();

        $this->delete("/api/exam-type/$examtype->id_exam_type")->assertStatus(200);
    }
}
