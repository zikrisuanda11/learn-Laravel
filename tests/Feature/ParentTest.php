<?php

namespace Tests\Feature;

use App\Models\Parents;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ParentTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_parent()
    {
    
        $formData = [
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "suanda",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('POST', '/api/parent', $formData)
            ->assertStatus(201);
    }

    public function test_get_parent()
    {
        $response = $this->get('/api/parent');
        $response->assertStatus(200);
    }

    public function test_update_parent()
    {
        $parent = Parents::factory()->create();    

        $update = [
            "email" => "zikrisuanda@gmail.com",
            "password" => "satuduatiga",
            "fname" => "zikri",
            "lname" => "ahmad",
            "date_of_birth" => "2002-02-25",
            "phone" => "0831522609092",
        ];

        $this->json('POST', "/api/parent/$parent->id_parent", $update)
            ->assertStatus(200);
    }

    public function test_delete_parent()
    {
        $parent = Parents::factory()->create();

        $this->delete("/api/parent/$parent->id_parent")->assertStatus(200);
    }
}
