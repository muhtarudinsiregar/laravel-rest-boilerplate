<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A test to authenticate user.
     *
     * @return void
     */
    public function testItAuthenticateAUser()
    {
        $user = factory(User::class)->create();

        $response = $this->post(
            '/api/auth/login',
            ['email' => $user->email, 'password' => 'secret']
        );

        $response->assertStatus(200)->assertJsonStructure(
            ['access_token', 'token_type', 'expires_in']
        );
    }

    public function testItLogoutUser()
    {
        $user = factory(User::class)->create();

        $response = $this->post('/api/auth/logout', [], $this->headers($user));

        $response->assertStatus(200)->assertJsonFragment(
            ['message' => "Successfully logged out"]
        );
    }

    public function testItInvalidAuth()
    {
        $user = factory(User::class)->create();

        $response = $this->post(
            '/api/auth/login',
            [
                'email' => $user->email,
                'password' => false
            ]
        );

        $response->assertStatus(401)->assertJsonFragment(
            ['error' => 'Invalid Login Details']
        );
    }
}
