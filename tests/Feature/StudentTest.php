<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StudentTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_student()
    {
        $response = $this->get('/api/student');

        $response->assertStatus(200);
    }

    public function test_store_student()
    {

        Parents::factory()->create();        

        $student = [
            "id_parent" => 1,
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "suanda",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('POST', '/api/student', $student)->assertStatus(201);
    }

    public function test_update_student()
    {
        Parents::factory()->create();

        $student = Student::factory()->create();

        $update = [
            "id_parent" => 1,
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "suanda",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('POST', "/api/student/$student->id_student", $update)->assertStatus(200);
    }

    public function test_delete_student()
    {
        Parents::factory()->create();
        $student = Student::factory()->create();

        $this->delete("/api/student/$student->id_student")->assertStatus(200);
    }
}
