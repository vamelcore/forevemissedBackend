<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class InvitationApiTest extends TestCase
{
    public function test_bad_link_response():void
    {
        $response = $this->json('get','/api/v1/invitation');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_success_response(): void
    {
        $data = [
            "data" => [
                [
                    "name" => "Susan Wojcicki",
                    "email" => "mail@mail.com",
                    "role" => "Administrator",
                ]
            ]
        ];

        $response = $this->json('post', '/api/v1/invitation/process', $data);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'success' => true
        ]);
    }

    public function test_bed_structure_without_data_response(): void
    {
        $data = [
            "name" => "Susan Wojcicki",
            "email" => "mail@mail.com",
            "role" => "Administrator",
        ];

        $response = $this->json('post', '/api/v1/invitation/process', $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors([
            "data"
        ]);
    }

    public function test_bed_structure_response(): void
    {
        $data = [
            "data" => [
                "name" => "Susan Wojcicki",
                "email" => "mail@mail.com",
                "role" => "Administrator",
            ],
        ];

        $response = $this->json('post', '/api/v1/invitation/process', $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors([
            "data.name"
        ]);
    }

    public function test_validation_response(): void
    {
        $data = [
            "data" => [
                [
                    "name" => "A",
                    "email" => "mail@mailcom",
                    "role" => "Admin",
                ]
            ]
        ];

        $response = $this->json('post', '/api/v1/invitation/process', $data);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors([
            "data.0.name",
            "data.0.email",
            "data.0.role"
        ]);
    }
}
