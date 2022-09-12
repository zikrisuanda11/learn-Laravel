<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_attendance()
    {
        $response = $this->get('/api/attendance');
        $response->assertStatus(200);
    }

    public function test_store_attendance()
    {
        Parents::factory()->create();

        Student::factory()->create();

        $attendance = Attendance::factory()->create();

        $this->json('post', '/api/attendance', $attendance->getRawOriginal())->assertStatus(201);
    }

    public function test_update_attendance()
    {
        Parents::factory()->create();

        Student::factory()->create();

        $attendance = Attendance::factory()->create();

        $update = [
            'date' => '2002-02-20',
            'id_student' => 1,
            'status' => 'hadir',
            'remarks' => 'anjayMabar'
        ];

        $header = [
            'Accept' => 'application/json',
        ];        
        $this->put("/api/attendance/$attendance->id_attendance", $update, $header)->assertStatus(200);
    }

    public function test_delete_attendance()
    {
        Parents::factory()->create();

        Student::factory()->create();

        $attendance = Attendance::factory()->create();

        $this->delete("/api/attendance/$attendance->id_attendance")->assertStatus(200);
    }
}
