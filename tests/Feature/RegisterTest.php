<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterEndpoint()
    {
        $user = factory(User::class)->make();

        $response = $this->post(
            '/api/auth/register',
            [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ]
        );

        $response->assertStatus(201);
    }

    public function testItFailWhenNameIsNull()
    {
        $user = factory(User::class)->make();

        $response = $this->post(
            '/api/auth/register',
            [
                'email' => $user->email,
                'password' => $user->password
            ]
        );

        $response->assertStatus(422)->assertJsonStructure(
            ['message', 'errors', 'status_code']
        );
    }
}
