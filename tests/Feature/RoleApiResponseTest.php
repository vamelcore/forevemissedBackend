<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class RoleApiResponseTest extends TestCase
{
    public function test_bad_link_responce():void
    {
        $response = $this->json('get','/api/v1/roles');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'message' => 'Available routes: GET /roles/list and POST /invitation/process'
        ]);
    }

    public function test_the_application_success_response(): void
    {
        $response = $this->json('get','/api/v1/roles/list');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonPath('data.0.name', 'Administrator');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description'
                ]
            ]
        ]);
    }
}
