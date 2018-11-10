<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->login();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetUserDataExample()
    {
        $response = $this->get('api/auth/me');

        $response->assertSuccessful()
            ->assertJsonStructure(['data' => ['id', 'name', 'email', 'created_at', 'updated_at']]);
    }
}
