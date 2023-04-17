<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class WrongUrlTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_request_to_root_url(): void
    {
        $response = $this->json('get','/api');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_request_to_root_version_url(): void
    {
        $response = $this->json('get','/api/v1');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_request_to_wrong_root_url(): void
    {
        $response = $this->json('get','/api/v');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_request_to_wrong_root_version_url(): void
    {
        $response = $this->json('get','/api/v1/test');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_request_to_root_invitation_url():void
    {
        $response = $this->json('get','/api/v1/invitation');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_request_to_root_roles_url():void
    {
        $response = $this->json('get','/api/v1/roles');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }
}
