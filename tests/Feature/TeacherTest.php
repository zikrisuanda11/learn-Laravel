<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_teacher()
    {
        $this->get('/api/teacher')->assertStatus(200);
    }

    public function test_store_teacher()
    {
        $store = [
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "ahmad",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('post', '/api/teacher', $store)->assertStatus(201);
    }

    public function test_update_teacher()
    {
        $teacher = Teacher::factory()->create();
        
        $update = [
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "ahmad",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('post', "/api/teacher/$teacher->id_teacher", $update)->assertStatus(200);
    }

    public function test_delete_teacher()
    {
        $teacher = Teacher::factory()->create();
        $this->delete("/api/teacher/$teacher->id_teacher")->assertStatus(200);
    }
}
