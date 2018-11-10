<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $headers = ['Accept' => 'application/json'];

    public function headers($user)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token = JWTAuth::fromUser($user);
            JWTAuth::setToken($token);
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $headers;
    }

    public function login($user = null)
    {
        $user = $user ? : factory(User::class)->create();
        $token = auth()->login($user);

        $this->headers['Authorization'] = 'Bearer ' . $token;

        return $this;
    }
}
